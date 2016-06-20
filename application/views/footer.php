<header></header>
    <main></main>
    <footer class="page-footer" style="background-color: #28B1E7 !important;">
        <div class="footer-copyright center" style="background-color: #28B1E7!important; font-family:'robotomedium';color:white;">         
                © <?php echo date('Y')?> Copyright UNIMARK S.A            
        </div>
    </footer>
    
    <script type="text/javascript" src="<?php echo base_url('assets/js/JQExcel.js')?>"></script>
     <script type="text/javascript">
        $(".botonExcel").click(function(event) {        
            
            $("#datos_a_enviar").val( $("<div>").append( $("#tbArticulos").eq(0).clone()).html());
            $("#FormularioExportacion").submit();
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>    
    <script src="<?php echo base_url(); ?>assets/media/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/media/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>        
    <script >

   
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/index.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/index_admin.js')?>"></script>
    <script src="<?php echo base_url(); ?>assets/media/js/extensions/jquery.numeric.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/media/js/extensions/jquery.numeric.min.js" type="text/javascript"></script>
    <script>
    </script>
   
</body>
</html>