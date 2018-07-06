<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sicpa Planning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">




<!------------------------------------------------------------------------------------------->








<link rel="stylesheet" href="./assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="./assets/plugins/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/plugins/select2-4.0.3/dist/css/select2.min.css" rel="stylesheet">
    <link href="./assets/css/select2-bootstrap.min.css" rel="stylesheet">
        <link href="./assets/css/themes/soplanning.css?1.41" rel="stylesheet" type="text/css" />
    <link href="./assets/css/jauges.css?1.41" rel="stylesheet" type="text/css" />
    <link href="./assets/css/styles.css?1.41" rel="stylesheet" type="text/css" />
    <link href="./assets/css/mobile.css?1.41" rel="stylesheet" media="screen and (max-width: 1165px)" type="text/css" />
        <link href="./assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
    <link href="./assets/plugins/jquery-ui-1.12.1/jquery-ui.theme.min.css" rel="stylesheet">
    <script type="text/javascript" src="./assets/js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/jquery-ui-1.12.1/i18n/jquery.ui.datepicker-en.js"></script>
        <script type="text/javascript" src="./assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./assets/plugins/jquery-multiselect/jquery.multiselect.js"></script>
    <link href="./assets/plugins/jquery-multiselect/jquery.multiselect.css" rel="stylesheet">
        <script type="text/javascript" src="./assets/plugins/jscolor/jscolor.js"></script>
        <link rel="stylesheet" type="text/css" href="./assets/plugins/tooltipster/css/tooltipster.bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="./assets/plugins/tooltipster/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-soplanning.min.css" />
    <script type="text/javascript" src="./assets/plugins/tooltipster/js/tooltipster.bundle.min.js"></script>
        <script type="text/javascript" src="./assets/plugins/bootstrap3-typeahead/bootstrap3-typeahead.min.js"></script>
        <script type="text/javascript" src="./assets/js/sousmenu.js"></script>
    <script type="text/javascript" src="./assets/js/fonctions.js"></script>
    <script type="text/javascript" src="./assets/plugins/select2-4.0.3/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/select2-4.0.3/dist/js/i18n/en.js"></script>
    <link href="./assets/css/print.css" rel="stylesheet" media="print">
      <script type="text/javascript">
var xajaxRequestUri="./process/xajax_server.php";
var xajaxDebug=false;
var xajaxStatusMessages=false;
var xajaxWaitCursor=false;
var xajaxDefinedGet=0;
var xajaxDefinedPost=1;
var xajaxLoaded=false;
function xajax_ajoutProjet(){return xajax.call("ajoutProjet", arguments, 1);}
function xajax_modifProjet(){return xajax.call("modifProjet", arguments, 1);}
function xajax_submitFormProjet(){return xajax.call("submitFormProjet", arguments, 1);}
function xajax_supprimerProjet(){return xajax.call("supprimerProjet", arguments, 1);}
function xajax_checkProjetId(){return xajax.call("checkProjetId", arguments, 1);}
function xajax_checkRessourceId(){return xajax.call("checkRessourceId", arguments, 1);}
function xajax_checkLieuId(){return xajax.call("checkLieuId", arguments, 1);}
function xajax_checkCategorieId(){return xajax.call("checkCategorieId", arguments, 1);}
function xajax_ajoutPeriode(){return xajax.call("ajoutPeriode", arguments, 1);}
function xajax_modifPeriode(){return xajax.call("modifPeriode", arguments, 1);}
function xajax_submitFormPeriode(){return xajax.call("submitFormPeriode", arguments, 1);}
function xajax_moveCasePeriode(){return xajax.call("moveCasePeriode", arguments, 1);}
function xajax_checkAvailableVersion(){return xajax.call("checkAvailableVersion", arguments, 1);}
function xajax_choixPDF(){return xajax.call("choixPDF", arguments, 1);}
function xajax_modifUser(){return xajax.call("modifUser", arguments, 1);}
function xajax_submitFormUser(){return xajax.call("submitFormUser", arguments, 1);}
function xajax_supprimerUser(){return xajax.call("supprimerUser", arguments, 1);}
function xajax_modifProfil(){return xajax.call("modifProfil", arguments, 1);}
function xajax_submitFormProfil(){return xajax.call("submitFormProfil", arguments, 1);}
function xajax_changerPwd(){return xajax.call("changerPwd", arguments, 1);}
function xajax_nouveauPwd(){return xajax.call("nouveauPwd", arguments, 1);}
function xajax_supprimerPeriode(){return xajax.call("supprimerPeriode", arguments, 1);}
function xajax_modifFerie(){return xajax.call("modifFerie", arguments, 1);}
function xajax_submitFormFerie(){return xajax.call("submitFormFerie", arguments, 1);}
function xajax_supprimerFerie(){return xajax.call("supprimerFerie", arguments, 1);}
function xajax_choixIcal(){return xajax.call("choixIcal", arguments, 1);}
function xajax_modifUserGroupe(){return xajax.call("modifUserGroupe", arguments, 1);}
function xajax_submitFormUserGroupe(){return xajax.call("submitFormUserGroupe", arguments, 1);}
function xajax_supprimerUserGroupe(){return xajax.call("supprimerUserGroupe", arguments, 1);}
function xajax_autocompleteTitreTache(){return xajax.call("autocompleteTitreTache", arguments, 1);}
function xajax_submitFormContact(){return xajax.call("submitFormContact", arguments, 1);}
function xajax_modifLieu(){return xajax.call("modifLieu", arguments, 1);}
function xajax_submitFormLieu(){return xajax.call("submitFormLieu", arguments, 1);}
function xajax_supprimerLieu(){return xajax.call("supprimerLieu", arguments, 1);}
function xajax_modifRessource(){return xajax.call("modifRessource", arguments, 1);}
function xajax_submitFormRessource(){return xajax.call("submitFormRessource", arguments, 1);}
function xajax_supprimerRessource(){return xajax.call("supprimerRessource", arguments, 1);}
function xajax_modifStatus(){return xajax.call("modifStatus", arguments, 1);}
function xajax_submitFormStatus(){return xajax.call("submitFormStatus", arguments, 1);}
function xajax_supprimerStatus(){return xajax.call("supprimerStatus", arguments, 1);}
function xajax_icalGenererLien(){return xajax.call("icalGenererLien", arguments, 1);}
function xajax_usersBulkRightsForm(){return xajax.call("usersBulkRightsForm", arguments, 1);}
function xajax_usersBulkRightsSubmit(){return xajax.call("usersBulkRightsSubmit", arguments, 1);}
  </script>
  <script type="text/javascript" src="assets/js/xajax.js"></script>
  <script type="text/javascript">
window.setTimeout(function () { if (!xajaxLoaded) { alert('Error: the xajax Javascript file could not be included. Perhaps the URL is incorrect?\nURL: assets/js/xajax.js'); } }, 6000);
  </script>






<!------------------------------------------------------------------------------------------->












 <link rel="icon" type="image/vnd.microsoft.icon" sizes="48x48" href="img/index.ico">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/mystyle.css">
  <script src="jquery/jquery.min.js"></script>
 
  <style>


  #show_site tr td {
    text-align: center;
    

  }  
  </style>
  
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" style="padding: 15px 0 15px 15px ;" href="index.php"><img src="img/Sicpa1.png" style="margin-top: -25px ; margin-left:-16px ; width: 73px;"></a>
    </div>
    <div class="collapse navbar-collapse" style="font-size: 1.21em; font-weight: bold; margin-top: 2px;" id="myNavbar">
      <ul class="nav navbar-nav">
        
        <li><a href="index.php?page=plan">Planning</a></li>
        <li><a href="index.php?page=plan_for_user">Plan The Shift</a></li>
        <li><a href="index.php?page=compare">Compare</a></li>

     </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span style="padding-right: 6px;"  class="glyphicon glyphicon-log-in"></span>Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid" style="padding-top: 85px;">
  
  <div class="row content">
   
  