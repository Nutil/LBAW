<?php
function questionSearch($query)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM search_questions(?);");
    $stmt->execute(array($query));
    $rows = $stmt->fetchAll();

    $question_ids = [];
    foreach ($rows as $row) {
        $question_ids[] = $row['question_id'];
    }

    return questionsFromIds($question_ids);
}

function questionsFromIds($ids = [])
{
    global $conn;

    // fix later
    $points = [];
    foreach ($ids as $id) {
        $points[] = '?';
    }
    $points = implode(', ', $points);

    $stmt = $conn->prepare("SELECT id, title, body, solved, updated_at, 
        (SELECT COUNT(*) FROM question_answers(id)) as number_answers,
        votable_rating(id, 'q') as votes
        FROM questions 
        WHERE id IN ($points);");
    $stmt->execute($ids);
    $rows = $stmt->fetchAll();

    return $rows;
}