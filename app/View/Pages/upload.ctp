</script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
 
  
<div class="container" style="margin-top: 20px;">
    <div class="row">
        
        <div class="col-lg-6 col-sm-6 col-12">
            <div class="jumbotron">
                <h1>Bootstrap File Input Demo</h1>
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-12">
            <h4>Standard Button</h4>
            <span class="file-input btn btn-primary btn-file">
                Browse&hellip; <input type="file" multiple>
            </span>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <h4>Block-level Button
            <span class="file-input btn btn-block btn-primary btn-file">
                Browse&hellip; <input type="file" multiple>
            </span>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-12">
            <h4>Button Groups</h4>
            <div class="btn-group">
                <a href="#" class="btn btn-default">Action 1</a>
                <a href="#" class="btn btn-default">Action 2</a>
                <span class="btn btn-primary btn-file">
                    Browse&hellip; <input type="file" multiple>
                </span>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <h4>Input Groups</h4>
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file">
                        Browse&hellip; <input type="file" multiple>
                    </span>
                </span>
                <input type="text" class="form-control" readonly>
            </div>
            <span class="help-block">
                Try selecting one or more files and watch the feedback
            </span>
        </div>
        
    </div>
</div>