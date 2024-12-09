<html>
<head>
    <title>espace demande</title>
    <link rel="stylesheet" href="etudiant/assets/css/espace.css" type="text/css" />
    <link rel="stylesheet" href="etudiant/assets/css/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
   .has-error
   {
    border-color:#cc0000;
    background-color:#ffff99;
   }
   #register{
    margin-top : 40px ; 
    background-color : #0075ff ;
   }
   #seeAnotherFieldGroup{
    height: 45px;
    margin-top : 10px ; 
   }
   #seeAnotherFieldGroup option {
        
   }

  </style>
</head>

<body>
    <table id="table">
    <tr>
            <td colspan="2">
                <div class="header">Espace demandes</div>
            </td>
            <td colspan="2" style="text-align:right;">
            </td>
        </tr>
        
        <tr>
            <td>
                <div class="div1">
               <i>   <img src="etudiant/assets/img/demm.png" style="width : 50%;">
                   &nbsp;
                    <p>&nbsp;</p>
                    <button class="btn btn4" id="button1">Faire une demande</button>
                    
                </div>
            </td>
        </tr>    
    </table>
    <div class="popup">
            <div class="wrapper">
                        <h2 id='title'>Faire demande</h2>
                        @if (session('msg1'))
                        <h1>VUELLEZ CONSULTER VOS DONNEES</h1> 
                        @endif
                        @if (session('msg2'))
                        <h1>Demande envoyée</h1> 
                        @endif
                        <img src="{{url('adminDash/images/close.png')}}" class="close" alt="">
                        <form action="/espace_demande" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="userDet">
                                <div class="input-box">
                                    <input type="text" name="appoge" id="appoge" class="form-control input-lg" placeholder="Code Apogée" required>
                                    <span id="error_appoge"></span>
                                </div>
                                <div class="input-box">
                                    <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Votre Email" required>
                                    <span id = "error_email"></span>
                                </div>
                                    <select class="form-control" id="seeAnotherFieldGroup" name="Type">
                                        <option value="">Type de document</option>
                                        <option value="Attestation de Reussite">Attestation de Reussite</option>
                                        <option value="Convention de Stage">Convention du Stage</option>
                                        <option value="Attestation de Scolarité">Attestation de Scolarité</option>
                                        <option value="Relevé de Notes">Relevé de Notes</option>
                                    </select>
                                <div class="stage" id="stage">
                                    <div class="input-box">
                                        <input type="text" placeholder="Nom d'entreprise" name="N_entreprise" id="ent">
                                    </div>
                                    <div class="input-box">
                                        <input type="text" placeholder="Representant d'entreprise" name="R_entreprise" id="r_ent">
                                    </div>
                                    <div class="input-box">
                                        <input type="email" placeholder="Adresse email d'entreprise" name="A_email" id="a_mail">
                                    </div>
                                    <div class="input-box">
                                        <input type="text" placeholder="Tele d'entreprise" name="tele" id="tele">
                                    </div>
                                    <div class="input-box">
                                        <input type="text" placeholder="Adresse reel d'entreprise" name="A_reel" id="a_reel">
                                    </div>
                                    <div class="input-box">
                                        <input type="text" placeholder="Periode de stage" name="P_stage" id="p_stage">
                                    </div>
                                    <div class="input-box">
                                        <input type="text" placeholder="Encadrant d'entreprise" name="E_entreprise" id="e_ent">
                                    </div>
                                    <div class="input-box">
                                        <input type="text" placeholder="Encadrant d'ecole" name="E_ecole" id="e_ecole">
                                    </div>
                                    <div class="input-box">
                                        <input type="text" placeholder="Theme de stage" name="T_stage" id="t_stage">
                                    </div>                    
                                    <div class="input-box">
                                        <label for="recu">Reçu d'assurance</label>
                                        <input type="file"  name="image" accept="image/jpg,image/jpeg,image/png,image/pdf" id="recu">
                                    </div> 
                                </div>
                                    <div class="input-box" id='note'>
                                        <input type="text" name="semestre" id="semestre" class="form-control input-lg" placeholder="Semestre Demandée">
                                    </div>
                            </div>  
                            <div class="form-group" align="center">
                                <input type="Submit" name="register" id="register" value="Envoyer" class="btn btn-info btn-lg" >
                            </div>
                        </form>
                        {{ csrf_field() }}
                </div>
            </div>
        </div>

        <script>
$(document).ready(function(){

$('#appoge').blur(function(){
    var appoge = $('#appoge').val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{ route('espace_demande.check') }}",
    method:"POST",
    data:{
        appoge:appoge,
        _token : _token
    },
    success:function(result)
    {
    if(result == 'unique')
    {
    $('#error_appoge').html('<label class="text-success">Apogée disponible</label>');
    $('#appoge').removeClass('has-error');
    $('#register').attr('disabled', false);
    }
    else
    {
    $('#error_appoge').html('<label class="text-danger">Apogée non disponible</label>');
    $('#appoge').addClass('has-error');
    $('#register').attr('disabled', 'disabled');
    }
    }
})
});

$('#email').blur(function(){
var error_email = '';
var appoge = $('#appoge').val();
var email = $('#email').val();
var _token = $('input[name="_token"]').val();
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if(!filter.test(email))
{    
$('#error_email').html('<label class="text-danger">Invalide Email</label>');
$('#email').addClass('has-error');
$('#register').attr('disabled', 'disabled');
}
else
{
$.ajax({
    url:"{{ route('espace_demande.check') }}",
    method:"POST",
    data:{
        email:email, 
        appoge:appoge,
        _token : _token
    },
    success:function(result)
    {
    if(result == 'email')
    {
    $('#error_email').html('<label class="text-success">Email disponible</label>');
    $('#email').removeClass('has-error');
    $('#register').attr('disabled', false);
    }
    else
    {
    $('#error_email').html('<label class="text-danger">Email non disponible</label>');
    $('#email').addClass('has-error');
    $('#register').attr('disabled', 'disabled');
    }
    }
})
}
});
});
</script>
<script src="{{url('adminDash/admin.js')}}"></script>
@include('sweetalert::alert')
</body>
</html>