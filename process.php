<?php

if (isset($_POST['winner'], $_POST['looser'],
          $_POST['wScore'], $_POST['lScore']))
{
    function checkExists($mysqli, $token, $score)
    {
        $qExists = $mysqli->query('
                   SELECT id
                   FROM photos
                   WHERE token = "' . $mysqli->real_escape_string($token) . '"
                   AND score = ' . (int)$score);
        if ($qExists->num_rows >= 1)
            return(true);
        else
            return(false);
    }

    if (checkExists($mysqli, $_POST['winner'], $_POST['wScore']) == true &&
        checkExists($mysqli, $_POST['looser'], $_POST['lScore']) == true)
    {
        if ($_POST['wScore'] >= $_POST['lScore'])
        {
            $highScorePeople = $_POST['winner'];
            $lowScorePeople = $_POST['looser'];
            $highScore = $_POST['wScore'];
            $lowScore = $_POST['lScore'];
        }
        else
        {
            $highScorePeople = $_POST['looser'];
            $lowScorePeople = $_POST['winner'];
            $highScore = $_POST['lScore'];
            $lowScore = $_POST['wScore'];
        }

        $winnerUpResult = ((($highScore - $lowScore) / 100) * 2) + 20;
        $winnerDownResult = (($highScore - $lowScore) / 100) + 20;

        if ($highScorePeople == $_POST['winner'])
        {
            $mysqli->query('
            UPDATE photos
            SET score = score + ' . (int)$winnerUpResult . '
            WHERE token = "' . $mysqli->real_escape_string($highScorePeople) . '"');

            $mysqli->query('
            UPDATE photos
            SET score = score - ' . (int)$winnerDownResult . '
            WHERE token = "' . $mysqli->real_escape_string($lowScorePeople) . '"');
        }
        else
        {
            $mysqli->query('
            UPDATE photos
            SET score = score + ' . (int)$winnerDownResult . '
            WHERE token = "' . $mysqli->real_escape_string($lowScorePeople) . '"');

            $mysqli->query('
            UPDATE photos
            SET score = score - ' . (int)$winnerUpResult. '
            WHERE token = "' . $mysqli->real_escape_string($highScorePeople) . '"');
        }

        $mysqli->query('
        UPDATE photos
        SET score = 0
        WHERE score < 0');
    }
    else
    {
        header('Location: index.php');
        exit;
    }
}