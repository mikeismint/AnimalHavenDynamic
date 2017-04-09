<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="keywords" content="">
  <meta name="description" content"">
  <meta name="viewport" content="initial-scale=1">
  <title><?php echo htmlspecialchars($assets['pageTitle']) ?></title>
  <link rel="stylesheet" href="<?php echo STYLES_PATH ?>/main.css">
</head>

<body>
  <div class="container">

  <?php include( VIEW_PATH . '/includes/navigation.php' ); ?>

  <div class="content-row">
    <div class="mainContent">
      
      <div class="row">
        <h1 class="pageTitle"><?php echo htmlspecialchars($assets['pageTitle']) ?></h1>
