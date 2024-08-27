<?= $this->extend('template/header')?>
<?= $this->section('content')?>
<?= $this->include('template/menu')?>
<main class='content70 centerdiv'>
    <br>
    <h2>Your build</h2>
    <br>
    <div class='critical bldmessage' id='critical'></div>
    <div class='alert bldmessage' id='alert'></div>
    <div class='grid-container2'>
        <!--div class='card2'>
            <img src='' height='100px' width='100px'>
        </div>
        <div class='card2'>
            <h3>CPU</h3>
            <p>
                This is a placeholder
            </p>
            <p>
                This is a placeholder
            </p>
            <p>
                This is a placeholder
            </p>
        </div>
        <div class='card2'>
            <button>Remove</button>
        </div>
        <div class='card'>This is a placeholder</div>
        <div class='card'>This is a placeholder</div-->
        <!--Card-->
            <!--Image-->
            <!--Text-->
    </div>
    <div>
        <hr>
        Total price: <span id='totalSum'></span>
    </div>
</main>
<?= $this->endSection()?>