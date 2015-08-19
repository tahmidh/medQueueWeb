<?php 
include("header.php");
include("sidebarmenu.php");
include("topbarmenu.php");
?>            

<div class="content">

    <div class="page-header">
        <div class="icon">
            <span class="ico-arrow-right"></span>
        </div>
        <h1>Prescription<small>Medqueue</small></h1>
    </div>
    <!--------------------------Doctor Summary information------------------------------>
    <div class="row-fluid">
        <div class="span12">
            <!------------------------------------------------------------------------------>
            <div class="block">
                <div class="head red">                                
                    <h2>Symptoms</h2>
                    <ul class="buttons">             
                        <li><div class="icon"><span class="ico-info"></span></div></a></li>
                    </ul>                                
                </div>
                <textarea name="content" style="width:100%; height: 300px;"></textarea>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <!------------------------------------------------------------------------------>
            <div class="block">
                <div class="head green">                                
                    <h2>Prescription</h2>
                    <ul class="buttons">             
                        <li><div class="icon"><span class="ico-info"></span></div></a></li>
                    </ul>                                
                </div>
                <textarea name="content" style="width:100%; height: 300px;"></textarea>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span7">
            <!------------------------------------------------------------------------------>
            <div class="block">
                <div class="head yellow">                                
                    <h2>Medication</h2>
                    <ul class="buttons">             
                        <li><div class="icon"><span class="ico-info"></span></div></a></li>
                    </ul>                               
                </div>
                    <div class="block">
                        <table class="block" id="tableService">
                            <tr id="serviceTable">
                                <td>Medication</td>
                                <td>Dose(in days)</td>
                                <td>Frequency</td>
                            </tr>
                            <tr id="serviceTable">
                                <td><div class="input_container">
                                    <input type="text" id="keyword_id" placeholder="Enter Keyword">
                                    <ul id="keyword_list_id"></ul></div>    
                                </td>
                                <td><input type="text" name="name" placeholder="Last Name" id="form_catdes" required/></td>
                                <td><input type="text" name="name" placeholder="Last Name" id="form_catdes" required/></td>
                            </tr>

                        </table>
                    </div>
                    <!--textarea name="content" style="width:100%; height: 300px;"></textarea-->
                </div>
            </div>
            <div class="span5">
                <!------------------------------------------------------------------------------>
                <div class="block">
                    <div class="head blue">                                
                        <h2>tests</h2>
                        <ul class="buttons">             
                            <li><div class="icon"><span class="ico-info"></span></div></a></li>
                        </ul>                                
                    </div>
                    <!--****************************************************************************-->
                </div>
            </div>
        </div>
        <!--Doctor Summary information-->
        <!--Doctor Income Graph-->
        <div class="row-fluid">
            <button class="btn btn-success" type="button">Success button</button>
            <button class="btn" id="printP"type="button">Print Prescription</button>
            <button class="btn btn-success" type="button">Success button</button>
        </div>

    </div>

    <script type="text/javascript" src="../admin/js/plugins/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
        theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
        font_size_style_values: "12px,13px,14px,16px,18px,20px",
        content_css : "custom.css",
        selector: "textarea",
        plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
    </script>
</div> 
<?php 
include("footer.php");
?>          