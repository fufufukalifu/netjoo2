 <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?=$panelheading ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="container">
                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Daftar Soal</h3>
                                </div>
                                <div class="panel-body">
                                    <form action="#" id="formsoal">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="col-sm-2">
                                                    Filter:
                                                </div>
                                                <div class="row">
                                                    <div class="row-col-sm-12">
                                                       <div class="col-sm-4">
                                                        <select name="" id="tingkatID" class="form-control">
                                                            <option value="">Tingkat</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select name="" id="pelajaranID" class="form-control">
                                                            <option value="">Pelajaran</option>
                                                        </select>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                         <div class="col-sm-2">

                                         </div>
                                         <div class="row">
                                            <div class="row-col-sm-12">
                                             <div class="col-sm-4">
                                                <select name="" id="babID" class="form-control">
                                                    <option value="">Bab</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-4">
                                                <select name="" id="subBabId" class="form-control">
                                                    <option value="">Sub Bab</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>

                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-2">Soal:</div>
                                            <div class="col-sm-8 soal">
                                            </div>
                                            <div class="col-sm-12 btn">
                                                <div class="col-sm-2">
                                                    <br>
                                                    <input class="btn btn-primary tambahsoal" type="button" value="tambahkan soal"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Soal Yang Ditambahkan</h3>
                            </div>
                            <div class="panel-body soaltambah">
                                <form action="" id="">

                               
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div> 
<script>
    // Script for getting the dynamic values from database using jQuery and AJAX
    $(document).ready(function() {
        $('#TingkatID').change(function() {

            var form_data = {
                name: $('#TingkatID').val()
            };

            $.ajax({
                url: "<?php echo site_url('videoback/getPelajaran'); ?>",
                type: 'POST',
                data: form_data,
                success: function(msg) {
                    var sc='';
                    $.each(msg, function(key, val) {
                        sc+='<option value="'+val.id+'">'+val.keterangan+'</option>';
                    });
                    $("#pelajaranID option").remove();
                    $("#pelajaranID").append(sc);
                }
            });
        });


    });


// function loadmatapelajaran(){

// }

//buat load tingkat
function loadTingkat(){
    jQuery(document).ready(function(){
        var tingkat_id = {"tingkat_id" : $('#tingkatID').val()};
        var idTingkat;

        $.ajax({
            type: "POST",
            data: tingkat_id,
            url: "<?= base_url() ?>index.php/videoback/getTingkat",

            success: function(data){
                $('#tingkatID').html('<option value="">Tingkat</option>');
                $.each(data, function(i, data){
                    $('#tingkatID').append("<option value='"+data.id+"'>"+data.aliasTingkat+"</option>");
                    return idTingkat=data.id;
                });
            }
        });

        $('.addsoal').click(function(){
            var idBab = $('#babID').val();
            if (idBab=="") {
                alert('Pilih Bab Matapelajaran');
            }else{
                addsoal(idBab);
            };
            
            
        });
        $('#tingkatID').change(function(){
            tingkat_id={"tingkat_id" : $('#tingkat').val()};
            load_pelajaran($('#tingkatID').val());
            $('.soal').empty();
            $('pelajaranID').empty();
        });

        $('#pelajaranID').change(function(){
            pelajaran_id = {"pelajaran_id":$('#pelajaranID').val()};
            loadbab($('#pelajaranID').val());
            $('.soal').empty();
        });

        $('#babID').change(function(){
            bab_id = {"bab_id":$('#babID').val()};
            loadsubbab($('#babID').val());
            $('.soal').empty();
            // $('subbabID').empty();


        });


        $('#subBabId').change(function(){
             // console.log('cihuy');
             // alert('Pilih Bab Matapelajaran');
            $('.soal').empty();
            load_pelajaran(idTingkat);
            var idSubBab = $('#subBabId').val();
            if (idSubBab=="") {
                alert('Pilih Bab Matapelajaran');
            }else{
              addsoal(idSubBab);

            };
        });

        $('.tambahsoal').click(function(){
            tambahkansoal();
        });
    })};

    //buat load pelajaran
    function load_pelajaran(tingkatID){
        $.ajax({
            type: "POST",
            data: tingkatID.tingkat_id,

            url: "<?php echo base_url() ?>index.php/videoback/getPelajaran/"+tingkatID,
            success: function(data){
                $('#pelajaranID').html('<option value="">Mata Pelajaran</option>');
                $.each(data, function(i, data){
                    $('#pelajaranID').append("<option value='"+data.id+"'>"+data.keterangan+"</option>");
                });
            }
        });
    }
    //buat load bab
    function loadbab(mapelID){
        // var babID;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>index.php/videoback/getBab/"+mapelID,
            success: function(data){
                
                $('#babID').html('<option value="">Bab Pelajaran</option>');
                console.log(data);
                $.each(data, function(i, data){
                    $('#babID').append("<option value='"+data.id+"'>"+data.judulBab+"</option>");
                    // babid=data.id;
                });
            } 

        });
        // return 
    }

    //load sub bab
    function loadsubbab(babID) {

        $.ajax({
            type: "POST",
            data: babID.bab_id,
            url: "<?php echo base_url() ?>index.php/videoback/getSubbab/" + babID,
            success: function (data) {
                
                $('#subBabId').html('<option value="">-- Pilih Sub Bab Pelajaran  --</option>');
                console.log(data);
                $.each(data, function (i, data) {
                    $('#subBabId').append("<option value='" + data.id + "'>" + data.judulSubBab + "</option>");
                });
            }

        });
    }

    function addsoal(subBabId){
        console.log('testing');
        console.log(subBabId);
        $.ajax({

            type: "POST",
            url: "<?php echo base_url() ?>index.php/paketsoal/ajax_get_soal_by_subbabid/"+subBabId,
            success: function(data){
                $.each(data, function(i, data){
                    $('.soal').append(data.link);
                });
            }

        });
    }

    function pusharray(data){
        return 
    }

    function tambahkansoal(){
        var idsoal = [];
        $(':checkbox:checked').each(function(i){
         idsoal[i] = $(this).val();

        });  
        console.log(idsoal);
     

        var url = base_url+"index.php/paketsoal/addsoaltopaket";
       
        $.ajax({
            url : url,
            type: "POST",
            data: {data:idsoal},
            // cache: false,
          // dataType: "JSON",
            success: function(data,respone)
            {   console.log(respone);
                console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
             
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                alert('Error adding / update data');
            }
        });
    }
    loadTingkat();
    </script>