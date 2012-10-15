<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class KeywordNoteRepository extends EntityRepository {

    public function getKeywordNotes($keyword_id, $date_of_track) {
        $query = "
            SELECT *
            FROM keyword_note
            WHERE keyword_id=:keyword_id
            AND date_of_track=:date_of_track
        ";
        $params[':keyword_id'] = $keyword_id;
        $params[':date_of_track'] = $date_of_track;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function createNote($keyword_id, $note, $for_date) {
        $query = "INSERT INTO keyword_note(keyword_id, note, date_of_track, added) VALUES(:keyword_id, :note, :date_of_track, NOW())";
        $params[':keyword_id'] = $keyword_id;
        $params[':note'] = $note;
        $params[':date_of_track'] = $for_date;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
    }
    
    public function deleteNoteById($user_id, $note_id) {
        $query = "
            DELETE FROM keyword_note
            WHERE id=:note_id
            AND keyword_id IN(SELECT k.id FROM project p, keyword k WHERE p.user_id=:user_id AND k.project_id=p.id)";
        $params[':user_id'] = $user_id;
        $params[':note_id'] = $note_id;
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
    }

}