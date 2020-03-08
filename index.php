<?php require('./templates/header.php'); ?>
<?php require('./db/connect.php'); ?>

<?php
    $sqlBoard = "SELECT * FROM table_board INNER JOIN table_member
                ON table_board.board_member_id=table_member.member_id";
    $queryBoard = $conn->query($sqlBoard);
    $resultsBoard = $queryBoard->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($resultsBoard);

    // print("<pre>".print_r($resultsBoard, true)."</pre>");
?>
<div class="container">
    <div>
        hello, <?php echo $_SESSION['username']; ?>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Date</th>
                    <th scope="col">Author</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($resultsBoard as $key => $board): ?>
                <tr>
                    <th scope="row"><?php echo $key+1; ?></th>
                    <td>
                        <a href="board.php?boardId=<?php echo $board['board_id']; ?>">
                            <?php echo $board['board_topic']; ?>
                        </a>
                    </td>
                    <td><?php echo $board['board_date']; ?></td>
                    <td><?php echo $board['member_name']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require('./templates/footer.php'); ?>