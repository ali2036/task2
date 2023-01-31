<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">  
<meta name="csrf-token" content="{{ csrf_token() }}" /> 
<style>
    .upload-container {
        position: relative;
    }
    .upload-container input {
        border: 1px solid #92b0b3;
        background: #f1f1f1;
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        padding: 100px 0px 100px 250px;
        text-align: center !important;
        width: 500px;
    }
    .upload-container input:hover {
        background: #ddd;
    }   
    .upload-container:before {
        position: absolute;
        bottom: 50px;
        left: 245px;
        content: " (or) Drag and Drop files here. ";
        color: #3f8188;
        font-weight: 900;
    }   
    .upload-btn {
        margin-left: 300px;
        padding: 7px 20px;
    }        
</style>
</head>
<body>
    <form action="/upload" method='post' enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="upload-container">
            <input type="file" id="file_upload" name="file_upload[]" multiple />
        </div>
        <br>
        <input class="upload-btn" type='submit' value="Submit">   
    </form>
</body>
</html>