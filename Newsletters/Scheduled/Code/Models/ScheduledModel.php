<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Notification\Newsletters\Scheduled\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Kazist\KazistFactory;
use Kazist\Service\Email\Email;
use Kazist\Service\System\System;
use Kazist\Service\Database\Query;
use Kazist\Service\Json\Json;

/**
 * Description of ScheduledModel
 *
 * @author sbc
 */
class ScheduledModel extends BaseModel {

    //put your code here
    public $table_name = '';

    public function sendScheduledList() {

        $sheduledlist = $this->getScheduledList();

        if (!empty($sheduledlist)) {
            foreach ($sheduledlist as $sheduled) {
                $this->sendScheduled($sheduled);
            }
        }
    }

    public function sendScheduled($sheduled) {

        $email = new Email();

        $subject = $sheduled->subject;
        $body = $sheduled->body;
        $query_str = $this->getItemsQuery($sheduled);

        $email->priority = 7;
        $email->sendPreparedEmail($subject, $body, '', base64_encode($query_str));

        $data_obj = new \stdClass();
        $data_obj->id = $sheduled->id;
        $data_obj->scheduled_newsletter_date = date('Y-m-d', strtotime('+1 days'));

        $this->saveRecordByEntity('#__notification_newsletters_scheduled', $data_obj);
    }

    function getItemsQuery($sheduled) {

        $json = new Json();
        $system = new System();
        $query_obj = new Query();
        $factory = new KazistFactory();

        $table_selection = $factory->getRecord('#__notification_newsletters_scheduled_tables', 'nnst', array('nnst.id=:id'), array('id' => $sheduled->selection_list));

        $table_name = str_replace('/', '_', $table_selection->extension_path);
        $email_field = $table_selection->email_field;
        $user_field = ($table_selection->user_field <> '') ? $table_selection->user_field : 'created_by';
        $date_field = ($table_selection->date_field <> '') ? $table_selection->date_field : 'date_created';
        $list_limit = ($table_selection->list_limit <> '') ? $table_selection->list_limit : 10;
        $table_alias = $this->getTableAlias($table_name);

        $query = $this->getQueryBuilder($table_name, $table_alias);
        $this->getWhereQuery($query, $sheduled, $table_alias, $date_field);
        $query->setMaxResults($list_limit);


        if ($email_field <> '') {
            $query->addSelect($table_alias . '.' . $email_field . ' AS recipient');
        } else {
            $query->addSelect('uu_scheduled.email AS recipient');
            $query->leftJoin($table_alias, '#__users_users', 'uu_scheduled', 'uu_scheduled.id=' . $table_alias . '.' . $user_field);
        }

        $query_str = $query->getRawQuery();
        

        return $query_str;
    }

    public function getWhereQuery($query, $sheduled, $table_alias, $date_field) {

        $wait_period = $sheduled->wait_period;

        $field_name = $table_alias . '.' . $date_field;
        $start_date = date('Y-m-d', strtotime('-' . $wait_period . ' days'));
        $start_period = $start_date . ' 00:00:00';
        $end_period = $start_date . ' 23:59:59';

        $query->orWhere($field_name . ' BETWEEN \'' . $start_period . '\' AND \'' . $end_period . '\'');

     
    }

    public function getScheduledList() {

        $query = new Query();
        $query->select('nns.*');
        $query->from('#__notification_newsletters_scheduled', 'nns');
        $query->andWhere('nns.published=1');
        $query->andWhere('(nns.start_date < NOW() AND nns.end_date > NOW()) OR '
                . 'nns.end_date > NOW() OR nns.start_date < NOW()  OR '
                . '(nns.start_date IS NULL AND nns.end_date IS NULL)'
        );

        $records = $query->loadObjectList();

        return $records;
    }

    public function getTableFieldInputList() {

        $doctrine = $this->container->get('doctrine');

        $extension_path = $this->request->get('extension_path');
        $field_str = $this->request->get('field');
        $table_name = str_replace('/', '_', $extension_path);

        $json = $this->getJson($table_name);

        $tmp_array = array();

        foreach ($json['fields'] as $field) {

            if ($field_str == '') {
                $tmp_array[] = $field['name'];
            } elseif ($field_str == 'date') {
                if ($field['html_type'] == 'datetime' || $field['html_type'] == 'date') {
                    $tmp_array[] = $field['name'];
                }
            } elseif ($field_str == 'user') {
                if (($field['html_type'] == 'select' || $field['html_type'] == 'autocomplete' || $field['html_type'] == 'recordpicker') && $field['parameters']['source']['join_table_name'] == 'users_users') {
                    $tmp_array[] = $field['name'];
                }
            }
        }

        return $tmp_array;
    }

}
