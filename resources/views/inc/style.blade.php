<style>
    .fa_custom {
    color: #3333;
    }
    .modal-dialog{
        margin-top:200px;
    }
    .nav-tabs .nav-link.active{
        background-color:#455357;
        color:white;
        border-radius: 50px 20px !important; 
    }
    .nav-tabs .nav-link{
        background-color:#0d1a80;
        font-weight:bold;
        color:white;        
        font-size:12px;    
        border:none !important; 
    }
    .nav{
        background:#0d1a80;
    }     
    .navInact{
        background:#e5e5e8;
        color:white;
        border-radius: 50px 20px !important; 
    }
    .nav-item{
        margin:5px !important;  
    }
    
    ul.nav > li > a:hover {
        background-color: white;
        color:black;
        border-radius: 50px 20px!important; 
        transform: scale(1.2);
        border:0px;
    } 
    .nav-tabs .nav-links.active{
        background-color:white;
        color:#455357;
        border-radius: 50px 20px !important; 
    }.nav-tabs .nav-links{
        color:#e5e5e8;  
        font-weight:bold;
        border:none;
        background-color:#0d1a80;
    }.navbar-collapse{
    }
    #impScale:hover{
        transform: scale(1.2);}
    
        .animate {
    -webkit-animation-duration: 0.5s;
    animation-duration: 0.5s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
  }
  .two {
  -webkit-animation-delay: 0.5s;
  -moz-animation-delay: 0.5s;
  animation-delay: 0.5s;
  }
  .fadeInDown {
    -webkit-animation-name: fadeInDown;
    animation-name: fadeInDown;
   }@-webkit-keyframes fadeInDown {
  0% {
      opacity: 0;
      -webkit-transform: translate3d(0, -100%, 0);
      transform: translate3d(0, -100%, 0);
  }100% {
      opacity: 1;
      -webkit-transform: none;
      transform: none;
  }
  }
  @keyframes fadeInDown {
  0% {
      opacity: 0;
      -webkit-transform: translate3d(0, -100%, 0);
      transform: translate3d(0, -100%, 0);
  }
  100% {
      opacity: 1;
      -webkit-transform: none;
      transform: none;
  }
  }     
    table.dataTable thead tr {
        background-color:white;
        font-size:14px;
    } 
    table.dataTable thead .sorting, 
    table.dataTable thead .sorting_asc, 
    table.dataTable thead .sorting_desc {
        background : none;
        background-color : #9999;
        font-weight:bold;
    } 
    tbody tr{
        font-weight: normal;
        font-size: 12px !important;
    }
    tbody{
        border-color:black !important;
    }
    
    .dataTables_length{font-size:12px; width:300px;}
    button{border-radius: 10px !important; }
    .dataTables_filter label input{width:100px;}
    .dataTables_info{font-size:12px; }
    .dataTables_paginate a{font-size:12px;}

    td{
        font-size:10px;
        text-transform: uppercase !important;
    }th{
        font-size:10px;
    }
    label{
        font-size:12px !important;
    }
    select{
        font-size:12px !important;
        height:40px !important;
    }
    #loading {
                display: none;
                position: absolute;
                top: 0;
                left: 0;
                z-index: 100;
                width: 100vw;
                height: 100vh;
                background-color: rgba(192, 192, 192, 0.5);
                background-image: url("{{asset('loading.gif')}}");
                background-repeat: no-repeat;
                background-position: center;
                }
    .stockDetails{
        width:770px !important;
    }


  </style>