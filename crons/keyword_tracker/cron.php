<?php

require_once '../general/Db.class.php';

class KeywordTracker {

    protected function request($table_name, $table_content) {
        $fields = array_keys($table_content[0]);

        $inserts_str = '';
        $fields_arr = array();
        $cnt_fields = count($fields);
        $insert_str = 'INSERT INTO ' . $table_name . '(';
        for ($i = 0; $i < $cnt_fields; $i++) {
            $fields_arr[] = $fields[$i];
        }
        $insert_str .= implode(',', $fields_arr);
        $insert_str .= ')VALUES';

        $inserts_arr = $inserts_arr_big = array();
        $cnt_data = count($table_content);
        for ($i = 0; $i < $cnt_data; $i++) {
            foreach ($table_content[$i] as $value) {
                $inserts_arr[] = "'" . addslashes($value) . "'";
            }
            $inserts_arr_big[] = "(" . implode(',', $inserts_arr) . ")\n";
            $inserts_arr = array();
        }

        $insert_str .= implode(',', $inserts_arr_big);

        return $insert_str;
    }

    public function execute() {

        if (isset($_GET['type'])) {
            switch ($_GET['type']) {
                case 'user':
                    $query = "SELECT * FROM user";
                    break;
                case 'project_category':
                    $query = "SELECT * FROM project_category";
                    break;
                case 'project':
                    $query = "SELECT * FROM project";
                    break;
                case 'competitor':
                    $query = "SELECT * FROM competitor";
                    break;
                case 'keyword':
                    $query = "SELECT * FROM keyword";
                    break;
                case 'keyword_track':
                    $query = "SELECT * FROM keyword_track";
                    break;
                case 'keyword_track_competitor':
                    $query = "SELECT * FROM keyword_track_competitor";
                    break;
            }

            $result = DB::fetchAll($query);
            $inserts = $this->request($_GET['type'], $result);
            die($inserts);
        }
    }

    public function insertData() {
        $insert_str = file_get_contents('a');
        $explode = explode('===separator===', $insert_str);
        for ($i = 0; $i < count($explode); $i++) {
            Db::query($explode[$i]);
        }
        die('Imported successfully.');
    }

}

$cron = new KeywordTracker();
if (isset($_GET['type'])) {
    $cron->execute();
}
if (isset($_GET['todo'])) {

    $cron->insertData();
}
