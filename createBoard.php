<?php require('./templates/header.php'); ?>
<?php require('./db/connect.php'); ?>
<?php
  $action = $_GET['action'];
  if($action === 'create') {
    $memberId = $_SESSION['memberId'];
    $topic    = $_POST['topic'];
    $content  = $_POST['content'];

    $slashTopic = addslashes($topic);
    $slashContent = addslashes($content);

    $sqlInsertBoard = "INSERT INTO table_board 
                       (board_topic, board_content, board_member_id) 
                       VALUES 
                       ('$slashTopic', '$slashContent', '$memberId')";

    $resultInsertBoard = $conn->exec($sqlInsertBoard);
    if($resultInsertBoard) {
      echo "<script>alert('สร้างกระทู้สำเร็จ')</script>";
      echo "<script>window.location.href='index.php'</script>";
    }
  }
?>
<div class="container">
  <form action="createBoard.php?action=create" method="post">
    <div class="form-group">
      <label for="topic">Topic</label>
      <input
        type="text" 
        name="topic"
        class="form-control" 
        id="topic" 
        placeholder="Insert topic">
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea 
        name="content" 
        class="form-control" id="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Post</button>
  </form>
</div>

<?php require('./templates/footer.php'); ?>