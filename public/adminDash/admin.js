
     $('#stage').hide();
     $('#note').hide();
     $("#seeAnotherFieldGroup").change(function() {
            if ($(this).val() == "Convention de Stage") {
                document.getElementById("title").innerHTML = "Convention de stage";
                $('#note').hide();
                $('#semestre').removeAttr('required');
                $('#stage').show();
                $('#ent').attr('required', '');
                $('#r_ent').attr('required', '');
                $('#a_mail').attr('required', '');
                $('#tele').attr('required', '');
                $('#a_reel').attr('required', '');
                $('#p_stage').attr('required', '');
                $('#e_ent').attr('required', '');
                $('#e_ecole').attr('required', '');
                $('#t_stage').attr('required', '');
                $('#recu').attr('required', '');
         } 
            else if($(this).val() == "Attestation de Scolarité"){
                document.getElementById("title").innerHTML = "Attestation de Scolarité";
                $('#stage').hide();
                $('#note').hide();
                $('#semestre').removeAttr('required');
                $('#ent').removeAttr('required');
                $('#r_ent').removeAttr('required');
                $('#a_mail').removeAttr('required');
                $('#tele').removeAttr('required');
                $('#a_reel').removeAttr('required');
                $('#p_stage').removeAttr('required');
                $('#e_ent').removeAttr('required');
                $('#e_ecole').removeAttr('required');
                $('#t_stage').removeAttr('required');
                $('#recu').removeAttr('required');
         }
            else if($(this).val() == "Relevé de Notes"){
                document.getElementById("title").innerHTML = "Relevé de Notes";
                $('#stage').hide();
                $('#note').show();
                $('#semestre').attr('required','');
                $('#ent').removeAttr('required');
                $('#r_ent').removeAttr('required');
                $('#a_mail').removeAttr('required');
                $('#tele').removeAttr('required');
                $('#a_reel').removeAttr('required');
                $('#p_stage').removeAttr('required');
                $('#e_ent').removeAttr('required');
                $('#e_ecole').removeAttr('required');
                $('#t_stage').removeAttr('required');
                $('#recu').removeAttr('required');
            }
            else if($(this).val() == ""){
                document.getElementById("title").innerHTML = "Faire Demande"; 
                $('#stage').hide();
                $('#note').hide();
                $('#semestre').attr('required','');
                $('#ent').removeAttr('required');
                $('#r_ent').removeAttr('required');
                $('#a_mail').removeAttr('required');
                $('#tele').removeAttr('required');
                $('#a_reel').removeAttr('required');
                $('#p_stage').removeAttr('required');
                $('#e_ent').removeAttr('required');
                $('#e_ecole').removeAttr('required');
                $('#t_stage').removeAttr('required');
                $('#recu').removeAttr('required');
            }
         else {
            document.getElementById("title").innerHTML = "Attestation de Reussite";
             $('#stage').hide();
             $('#note').hide();
             $('#semestre').removeAttr('required');
             $('#ent').removeAttr('required');
             $('#r_ent').removeAttr('required');
             $('#a_mail').removeAttr('required');
             $('#tele').removeAttr('required');
             $('#a_reel').removeAttr('required');
             $('#p_stage').removeAttr('required');
             $('#e_ent').removeAttr('required');
             $('#e_ecole').removeAttr('required');
             $('#t_stage').removeAttr('required');
             $('#recu').removeAttr('required');
         }
});
     document.getElementById("button1").addEventListener("click",function(){
         document.querySelector(".popup").style.display = "flex";
     })
     document.querySelector(".close").addEventListener("click",function(){
         document.querySelector(".popup").style.display = "none";
     })
     $("#seeAnotherField").trigger("change");
     //verification etudiant donnees
