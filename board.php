<?php require('./templates/header.php'); ?>
<?php require('./db/connect.php'); ?>
<?php
$boardId = $_GET['boardId'];
$action = $_GET['action'];
$memberId = $_SESSION['memberId'];

if ($action === 'comment') {
  $comment = $_POST['comment'];
  $sqlInsertComment = "INSERT INTO table_comment 
                       (comment_content, comment_board_id, comment_member_id) VALUES 
                       ('$comment', '$boardId', '$memberId')";
  $resultInsertComment = $conn->exec($sqlInsertComment);
}

$sqlBoard = "SELECT * FROM table_board WHERE board_id='$boardId'";
$queryBoard = $conn->query($sqlBoard);
$resultBoard = $queryBoard->fetch(PDO::FETCH_ASSOC);

$sqlComment = "SELECT * FROM table_comment 
               INNER JOIN table_member
               ON table_comment.comment_member_id=table_member.member_id
               WHERE comment_board_id='$boardId'";
$queryComment = $conn->query($sqlComment);
$resultsComment = $queryComment->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container">
  <div>
    <h2><?php echo $resultBoard['board_topic']; ?></h2>
    <p>
      <pre><?php echo $resultBoard['board_content']; ?></pre>
    </p>
  </div>
  <hr />
  <div>
    #comment area.
  <?php foreach($resultsComment as $key => $comment): ?>
    <div>
      <?php echo $comment['comment_content']; ?> 
      By
      <?php echo $comment['member_name']; ?> 
    </div>
    <hr />
  <?php endforeach; ?>
  </div>
  <hr />
  <div>
    #add comment
    <form action="board.php?action=comment&boardId=<?php echo $boardId; ?>" method="post">
      <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" class="form-control" id="comment" rows="3"></textarea>
      </div>
      <button 
        class="btn btn-primary" 
        type="submit"
      >Comment</button>
    </form>
  </div>

</div>

<?php require('./templates/footer.php') ?>