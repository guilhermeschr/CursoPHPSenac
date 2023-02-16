<?php

class SQLite3Padrao extends SQLite3 {

    public function exec($query) {
        parent::query($query);
    }
}
