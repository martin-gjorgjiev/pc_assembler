<?= $this->extend('template/header')?>
<?= $this->section('content')?>
<?= $this->include('template/menu')?>
<div class="flex-container">
    <div class="flex-item-left">
        <?= $this->include('template/componentlist')?>
    </div>
    <div class="flex-item-middle">
        <div class='itemdiv'><table id="example" class="row-border compact" width="100%"></table></div>
    </div>
    <div class="flex-item-right">
        <div class="chattitle">
            <h2>Assistant</h2>
            <small>Here to help you pick compatible components</small>
            <div class="chatbody" id="chatbody"></div>
        </div>
        <div class='chattail' id="chattail" onclick="showChat()"><span>Show Chat</span></div>
        <div class="carttitle">Items</div>
        <div class="cartbody" id='cartbody'></div>
    </div>
</div>
<?= $this->endSection()?>