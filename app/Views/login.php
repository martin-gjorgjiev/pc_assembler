<?= $this->extend('template/header') ?>
<?= $this->section('content')?>
<?= $this->include('template/menu')?>
<div class="login-contanier rounded shadow">
  <div><h1>Log in</h1></div>
  <form action="<?= site_url('verify')?>" method='POST'>
    <div>
      <?= csrf_field() ?>
      <label>Email address</label>
      <input class='rounded' type="email" id="email" name="email" placeholder="Email address" required>
    </div>
    <div>
      <label>Password</label>
      <input class='rounded' type="password" id="password" name="password" placeholder="Password" required>
    </div>
    <button class='rounded btn1' type="submit">Log in</button>
    <?php if(isset($msg)){
      echo "<div>";
      echo $msg;
      echo "</div>";
    }?>
  </form>
</div>
<?= $this->endSection()?>