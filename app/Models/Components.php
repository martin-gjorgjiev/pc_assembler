<?php namespace App\Models;

use CodeIgniter\Model;

class Components extends Model{

    //table ones and specific item from fetch call
    function getcpu($questionsselected=null){
        $db = db_connect();
        $query=$db->table('cpuview');

        if(null!=$questionsselected){
            $query->where('name',$questionsselected);
        }

        $result=$query->get()
        ->getResultObject();
        return $result;
    }

    function getmotherboard($questionsselected=null){
        $db = db_connect();
        $query=$db->table('moboview');

        if(null!=$questionsselected){
            $query->where('name',$questionsselected);
        }

        $result=$query->get()
        ->getResultObject();
        return $result;
    }

    function getram($questionsselected=null){
        $db = db_connect();
        $query=$db->table('ramview');

        if(null!=$questionsselected){
            $query->where('name',$questionsselected);
        }

        $result=$query->get()
        ->getResultObject();
        return $result;
    }

    function getgpu($questionsselected=null){
        $db = db_connect();
        $query=$db->table('gpuview');

        if(null!=$questionsselected){
            $query->where('name',$questionsselected);
        }

        $result=$query->get()
        ->getResultObject();
        return $result;
    }

    function getpsu($questionsselected=null){
        $db = db_connect();
        $query=$db->table('psuview');

        if(null!=$questionsselected){
            $query->where('name',$questionsselected);
        }

        $result=$query->get()
        ->getResultObject();
        return $result;
    }

    function getstorage($questionsselected=null){
        $db = db_connect();
        $query=$db->table('storageview');

        if(null!=$questionsselected){
            $query->where('name',$questionsselected);
        }

        $result=$query->get()
        ->getResultObject();
        return $result;
    }

    function getpccase(){
        $db = db_connect();
        $result=$db->table('pccaseview')
        ->get()
        ->getResultObject();
        return $result;
    }

    //special
    function chipsetcompare($x,$y){
        $array=['supportedcpu.idcpu'=>$x,'chipset.name'=>$y];
        $db = db_connect();
        //$result=$db->query('SELECT * FROM `supportedcpu` JOIN `mobo` on `mobo`.`idchipset`=`supportedcpu`.`idchipset` JOIN `chipset` ON `chipset`.`id`=`mobo`.`idchipset` where supportedcpu.idcpu=1 AND chipset.name="H610" LIMIT 1; ')->getResult();

        $result=$db->table('supportedcpu')
        ->join('mobo','mobo.idchipset=supportedcpu.idchipset')
        ->join('chipset','chipset.id=mobo.idchipset')
        ->where($array)
        ->limit(1)
        ->get()
        ->getResultObject();
        return $result;
    }

    //query generating ones
    function cpuoptions($questionsselected){
        //$session = session();
        helper('cookie');
        $db = db_connect();
        $result=[];

        switch(count($questionsselected)){
            case 1:
                //maker 
                $query=$db->table('maker')
                ->select('maker.name')
                ->join('cpu','cpu.idmaker=maker.id')
                ->join('supportedcpu','supportedcpu.idcpu=cpu.id');

                if(null!==get_cookie('Motherboard')){
                    $var=json_decode(get_cookie('Motherboard'));
                    $query->join('mobo','supportedcpu.idchipset=mobo.idchipset')
                    ->join('socket','socket.id=mobo.idsocket')
                    ->where('mobo.id',$var->id)
                    ->where('socket.name',$var->{'socket name'});
                }

                $query->groupBy('maker.name');

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }
                
                break;
            case 2:
                //socket
                $query=$db->table('socket')
                ->select('socket.name')
                ->join('cpu','cpu.idsocket=socket.id')
                ->join('supportedcpu','supportedcpu.idcpu=cpu.id')
                ->join('maker','cpu.idmaker=maker.id');

                if(null!==get_cookie('Motherboard')){
                    $var=json_decode(get_cookie('Motherboard'));
                    $query->join('mobo','supportedcpu.idchipset=mobo.idchipset')
                    ->where('mobo.id',$var->id)
                    ->where('socket.name',$var->{'socket name'});
                }

                $query->where('maker.name',$questionsselected[1])
                ->groupBy('socket.name');

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }

                break;
            case 3:
                //series
                $query=$db->table('series')
                ->select('series.name')
                ->join('cpu','cpu.idseries=series.id')
                ->join('supportedcpu','supportedcpu.idcpu=cpu.id')
                ->join('maker','cpu.idmaker=maker.id')
                ->join('socket','cpu.idsocket=socket.id');

                if(null!==get_cookie('Motherboard')){
                    $var=json_decode(get_cookie('Motherboard'));
                    $query->join('mobo','supportedcpu.idchipset=mobo.idchipset')
                    ->where('mobo.id',$var->id);
                }

                $query->where('maker.name',$questionsselected[1])
                ->where('socket.name',$questionsselected[2])
                ->groupBy('series.name');

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }

                break;
            case 4:
                //graphics
                $result=['Yes','No'];

                break;
            case 5:
                //final
                $query=$db->table('cpu')
                ->select('cpu.name')
                ->join('supportedcpu','supportedcpu.idcpu=cpu.id')
                ->join('maker','cpu.idmaker=maker.id')
                ->join('socket','cpu.idsocket=socket.id')
                ->join('series','cpu.idseries=series.id');

                if(null!==get_cookie('Motherboard')){
                    $var=json_decode(get_cookie('Motherboard'));
                    $query->join('mobo','supportedcpu.idchipset=mobo.idchipset')
                    ->where('mobo.id',$var->id);
                }

                $query->where('maker.name',$questionsselected[1])
                ->where('socket.name',$questionsselected[2])
                ->where('series.name',$questionsselected[3])
                ->where('integrated_gpu',filter_var($questionsselected[4],FILTER_VALIDATE_BOOLEAN));

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }
                
                break;
            default:
                $result=['error'];
                break;
        }
        return $result;
    }

    function motherboardoptions($questionsselected){
        //$session = session();
        helper('cookie');
        $db = db_connect();
        $result=[];

        switch(count($questionsselected)){
            case 1:
                //socket 
                $query=$db->table('socket')
                ->select('socket.name')
                ->join('mobo','socket.id=mobo.idsocket');

                if(null!==get_cookie('CPU')){
                    $var=json_decode(get_cookie('CPU'));
                    $query->join('supportedcpu','mobo.idchipset=supportedcpu.idchipset')
                    ->join('cpu','supportedcpu.idcpu=cpu.id')
                    ->where('cpu.id',$var->id)
                    ->where('socket.name',$var->{'socket name'});
                }elseif(null!==get_cookie('RAM')){
                    $var=json_decode(get_cookie('RAM'));
                    $query->join('ramtype','mobo.idramtype=ramtype.id')
                    ->where('ramtype.ram_type',$var->{'ram type'});
                }

                $query->groupBy('socket.name');
                
                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }
                
                break;
            case 2:
                //chipset
                $query=$db->table('chipset')
                ->select('chipset.name')
                ->join('mobo','mobo.idchipset=chipset.id')
                ->join('socket','mobo.idsocket=socket.id');

                if(null!==get_cookie('CPU')){
                    $var=json_decode(get_cookie('CPU'));
                    $query->join('supportedcpu','mobo.idchipset=supportedcpu.idchipset')
                    ->join('cpu','supportedcpu.idcpu=cpu.id')
                    ->where('cpu.id',$var->id);
                }elseif(null!==get_cookie('RAM')){
                    $var=json_decode(get_cookie('RAM'));
                    $query->join('ramtype','mobo.idramtype=ramtype.id')
                    ->where('ramtype.ram_type',$var->{'ram type'});
                }

                $query->where('socket.name',$questionsselected[1])
                ->groupBy('chipset.name');

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }

                break;
            case 3:
                //ram type
                $query=$db->table('ramtype')
                ->select('ramtype.ram_type')
                ->join('mobo','mobo.idramtype=ramtype.id')
                ->join('socket','mobo.idsocket=socket.id')
                ->join('chipset','mobo.idchipset=chipset.id');

                if(null!==get_cookie('CPU')){
                    $var=json_decode(get_cookie('CPU'));
                    $query->join('supportedcpu','mobo.idchipset=supportedcpu.idchipset')
                    ->join('cpu','supportedcpu.idcpu=cpu.id')
                    ->where('cpu.id',$var->id);
                }elseif(null!==get_cookie('RAM')){
                    $var=json_decode(get_cookie('RAM'));
                    $query->where('ramtype.ram_type',$var->{'ram type'});
                }

                $query->where('socket.name',$questionsselected[1])
                ->where('chipset.name',$questionsselected[2])
                ->groupBy('ramtype.ram_type');

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['ram_type']);
                }

                break;
            case 4:
                //m2 slot
                $result=['Yes','No'];

                break;
            case 5:
                //final
                $query=$db->table('mobo')
                ->select('mobo.name')
                ->join('socket','mobo.idsocket=socket.id')
                ->join('chipset','mobo.idchipset=chipset.id')
                ->join('ramtype','mobo.idramtype=ramtype.id');

                $query->where('socket.name',$questionsselected[1])
                ->where('chipset.name',$questionsselected[2])
                ->where('ramtype.ram_type',$questionsselected[3]);

                if(filter_var($questionsselected[4],FILTER_VALIDATE_BOOLEAN)){
                    $query->where('mobo.maxm2slots >',"1");
                }else{
                    $query->where('mobo.maxm2slots <',"1");
                }

                if(null!==get_cookie('RAM')){
                    //size, speed and sticks
                    $var=json_decode(get_cookie('RAM'));
                    $query->where('mobo.maxmemsize >=',$var->size)
                    ->where('mobo.maxmemspeed >=',$var->speed)
                    ->where('mobo.maxmemslots >=',$var->slots);
                }

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }
                
                break;
            default:
                $result=['error'];
                break;
        }
        return $result;
    }

    function ramoptions($questionsselected){
        //$session = session();
        helper('cookie');
        $db = db_connect();
        $result=[];

        switch(count($questionsselected)){
            case 1:
                //ram type 
                $query=$db->table('ramtype')
                ->select('ramtype.ram_type')
                ->join('rammemory','rammemory.idramtype=ramtype.id');

                if(null!==get_cookie('Motherboard')){
                    //join motherboard and match
                    $var=json_decode(get_cookie('Motherboard'));
                    $query->join('mobo','mobo.idramtype=rammemory.idramtype')
                    ->where('ramtype.ram_type',$var->{'ram type'})
                    ->where('rammemory.size <=',$var->maxmemsize)
                    ->where('rammemory.speed <=',$var->maxmemspeed)
                    ->where('rammemory.slots <=',$var->maxmemslots);
                }elseif(null!==get_cookie('CPU')){                    
                    //join motherboard
                    //join supportedcpu
                    //join cpu and match
                    $var=json_decode(get_cookie('CPU'));
                    $query->join('mobo','mobo.idramtype=rammemory.id')
                    ->join('supportedcpu','supportedcpu.idchipset=mobo.idchipset')
                    ->join('cpu','cpu.id=supportedcpu.idcpu')
                    ->where('cpu.id',$var->id);
                }

                $query->groupBy('ramtype.ram_type');
                
                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['ram_type']);
                }
                
                break;
            case 2:
                //ram speed
                $query=$db->table('rammemory')
                ->select('rammemory.speed')
                ->join('ramtype','ramtype.id=rammemory.idramtype');

                if(null!==get_cookie('Motherboard')){
                    //join motherboard and match
                    $var=json_decode(get_cookie('Motherboard'));
                    $query->join('mobo','mobo.idramtype=rammemory.idramtype')
                    ->where('rammemory.size <=',$var->maxmemsize)
                    ->where('rammemory.speed <=',$var->maxmemspeed)
                    ->where('rammemory.slots <=',$var->maxmemslots);
                }

                $query->where('ramtype.ram_type',$questionsselected[1])
                ->groupBy('rammemory.speed');

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['speed']);
                }

                break;
            case 3:
                //ram size
                $query=$db->table('rammemory')
                ->select('rammemory.size')
                ->join('ramtype','ramtype.id=rammemory.idramtype');

                if(null!==get_cookie('Motherboard')){
                    //join motherboard and match
                    $var=json_decode(get_cookie('Motherboard'));
                    $query->join('mobo','mobo.idramtype=rammemory.idramtype')
                    ->where('rammemory.size <=',$var->maxmemsize)
                    ->where('rammemory.slots <=',$var->maxmemslots);
                }

                $query->where('ramtype.ram_type',$questionsselected[1])
                ->where('rammemory.speed',$questionsselected[2])
                ->groupBy('rammemory.size');

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['size']);
                }

                break;
            case 4:
                //final
                $query=$db->table('rammemory')
                ->select('rammemory.name')
                ->join('ramtype','ramtype.id=rammemory.idramtype');

                if(null!==get_cookie('Motherboard')){
                    //join motherboard and match
                    $var=json_decode(get_cookie('Motherboard'));
                    $query->join('mobo','mobo.idramtype=rammemory.idramtype')
                    ->where('rammemory.slots <=',$var->maxmemslots);
                }

                $query->where('ramtype.ram_type',$questionsselected[1])
                ->where('rammemory.speed',$questionsselected[2])
                ->where('rammemory.size',$questionsselected[3])
                ->groupBy('rammemory.name');

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }
                
                break;
            default:
                $result=['error'];
                break;
        }
        return $result;
    }

    function gpuoptions($questionsselected){
        //$session = session();
        helper('cookie');
        $db = db_connect();
        $result=[];

        switch(count($questionsselected)){
            case 1:
                //series
                $query=$db->table('series')
                ->select('series.name')
                ->join('gpu','gpu.idseries=series.id');

                if(null!==get_cookie('Power%20Supply')){
                    $var=json_decode(get_cookie('Power%20Supply'));
                    $query->join('psu','gpu.rec_wattage<=psu.wattage')
                    ->where('gpu.rec_wattage <=',$var->wattage);
                }

                $query->groupBy('series.name');
                
                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }
                
                break;
            case 2:
                //final
                $query=$db->table('gpu')
                ->select('gpu.name')
                ->join('series','gpu.idseries=series.id');

                if(null!==get_cookie('Power%20Supply')){
                    $var=json_decode(get_cookie('Power%20Supply'));
                    $query->join('psu','gpu.rec_wattage<=psu.wattage')
                    ->where('gpu.rec_wattage <=',$var->wattage);
                }

                $query->where('series.name',$questionsselected[1])
                ->groupBy('gpu.name');

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }
                
                break;
            default:
                $result=['error'];
                break;
        }
        return $result;
    }

    function psuoptions($questionsselected){
        //$session = session();
        helper('cookie');
        $db = db_connect();
        $result=[];

        switch(count($questionsselected)){
            case 1:
                //wattage
                $query=$db->table('psu')
                ->select('psu.wattage');

                if(null!==get_cookie('GPU')){
                    $var=json_decode(get_cookie('GPU'));
                    $query->join('gpu','gpu.rec_wattage<=psu.wattage')
                    ->where('psu.wattage >=',$var->rec_wattage);
                }

                $query->groupBy('psu.wattage')
                ->orderBy('psu.wattage','ASC');
                
                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['wattage']);
                }
                
                break;
            case 2:
                //final
                $query=$db->table('psu')
                ->select('psu.name');

                $query->where('psu.wattage',$questionsselected[1])
                ->groupBy('psu.name');

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }
                
                break;
            default:
                $result=['error'];
                break;
        }
        return $result;
    }

    function storageoptions($questionsselected){
        //$session = session();
        helper('cookie');
        $db = db_connect();
        $result=[];

        switch(count($questionsselected)){
            case 1:
                //storage type
                $query=$db->table('storagetype')
                ->select('storagetype.name')
                ->join('storage','storagetype.id=storage.idtypeslot');

                if(null!==get_cookie('Motherboard')){
                    $var=json_decode(get_cookie('Motherboard'));
                    if($var->maxm2slots<1){
                        $query->notHavingLike('storagetype.name','.2',true,true);
                    }
                }

                $query->groupBy('storagetype.name');
                
                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }
                
                break;
            case 2:
                //storage size
                $query=$db->table('storage')
                ->select('storage.storagesize')
                ->join('storagetype','storagetype.id=storage.idtypeslot');

                $query->where('storagetype.name',$questionsselected[1])
                ->groupBy('storage.storagesize');

                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['storagesize']);
                }
                
                break;
            case 3:
                //final
                $query=$db->table('storage')
                ->select('storage.name')
                ->join('storagetype','storagetype.id=storage.idtypeslot');

                $query->where('storagetype.name',$questionsselected[1])
                ->where('storage.storagesize',$questionsselected[2])
                ->groupBy('storage.name');
    
                $results=$query->get();
                foreach ($results->getResultArray() as $row) {
                    array_push($result,$row['name']);
                }
                    
                break;
            default:
                $result=['error'];
                break;
        }
        return $result;
    }
}
