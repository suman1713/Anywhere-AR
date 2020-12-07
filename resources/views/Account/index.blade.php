<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account | Anywhere AR</title>
    @include('layouts._metaCSS')
    <style>
        /* tooltip with img */
    
            
    a.tooltipImg {outline:none; }
    a.tooltipImg strong {line-height:30px;}
    a.tooltipImg:hover {text-decoration:none;} 
    a.tooltipImg  .div-top {
        z-index:10;display:none; padding:14px 20px;
        margin-top:60px; margin-left: 0;
        width:auto; line-height:16px;height: 50vh;
        transition: 0.5s;
    }
    a.tooltipImg:hover  .div-top{
        display:inline;
        border:2px solid #FFF;
        background: transparent;
        border-radius: 10px;
        /* background:#333 url('../../slider.jpg') repeat-x 0 0; */
        margin: 0;
        padding: 0;
        position: absolute;
        left: 0;
        height: 300px;
        top: 50px;
        z-index: 999;
        transition: 0.5s;
    }
    
    .callout {z-index:20;position:absolute;border:0;top:-14px;left:120px;}
        
    /*CSS3 extras*/
    a.tooltipImg .div-top
    {
        border-radius:2px;        
        box-shadow: 0px 0px 8px 4px #666;
        /*opacity: 0.8;*/
    }
    
        </style>
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100" style="    padding: 80px 100px 33px 95px;">
                <div class="col-md-5">
                    <div class="js-tilt" data-tilt>
                        <img src="{{url('images/arlogo.jpg')}}" alt="IMG" style="width: 100%">
                    </div>

                    <div class="container-login100-form-btn">
                        <a href="{{url('admin/marker')}}" class="login100-form-btn">Download Markers</a>
                    </div>
                    <div class="container-login100-form-btn">
                        <a href="{{url('admin/scene_detail')}}" class="login100-form-btn">Create Scene</a>
                    </div>
                </div>

                <div class="col-md-7">
                        <div style="border: 1px solid #e7dffc;">
                            <h3 style="border-left: 4px solid #27449e; padding: 10px; text-transform: capitalize;">My Scenes</h3>
                            <div style="height: 70vh;
                            overflow-y: auto;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Scene Name</th>
                                            <th>Action</th>
                                            <th>QR code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($scenes as $scene)
                                            <tr>
                                                <td>{{$scene->scene_name}}</td>
                                                <td><a href="{{url('admin/scene_detail/edit/'.$scene->id)}}" class="btn info" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a><a href="{{url('admin/scene_detail/delete/'.$scene->id)}}" class="btn danger" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                                <td>
                                                    <a href="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl={{ url('/scene?scene_code='.base64_encode($scene->id)) }}&chld=H|0" download="" target="_blank" class="tooltipImg" data-position="left" data-delay="50" data-tooltip="" ><img id='barcode' src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl={{ url('/scene?scene_code='.base64_encode($scene->id)) }}&chld=H|0"  alt="" title="{{$scene->scene_name}}" width="50" height="50" />
                                                        <div class=" div-top row" style="margin:0; padding: 0;">
                                                            <img class="col s12" style="width: auto; height: 100%; margin:0; padding: 0; object-fit: cover; object-position: center; border-radius: 10px;" src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl={{ url('/scene?scene_code='.base64_encode($scene->id)) }}&chld=H|0" alt="" />
                                                            
                                                        </div>
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>

                <div class="text-center">
                        <a class="txt3" href="{{ route('logout') }}">
                            Logout, Goodbye!
                            <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                        </a>
                </div>
            </div>
        </div>




        @include('layouts._js')

        {{-- <script> 
            document.onreadystatechange = function() { 
                if (document.readyState !== "complete") { 
                    document.querySelector( 
                      "body").style.visibility = "hidden"; 
                    document.querySelector( 
                      ".loader").style.visibility = "visible"; 
                } else { 
                    document.querySelector( 
                      ".loader").style.display = "none"; 
                    document.querySelector( 
                      "body").style.visibility = "visible"; 
                } 
            }; 
        </script>  --}}

</body>

</html>
