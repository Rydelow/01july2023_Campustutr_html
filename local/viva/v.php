
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, 
                   initial-scale=1.0">
    <style>
        body {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
          
        video {
            background-color: black;
            margin-bottom: 1rem;
        }
          
        #error {
            color: red;
            padding: 0.6rem;
            background-color: rgb(236 157 157);
            margin-bottom: 0.6rem;
            display: none;
        }
    </style>
    <title>GetUserMedia demo</title>
</head>
  
<body>
    <h1> WebRTC getUserMedia() demo</h1>
  
    <!-- If you use the playsinline attribute then 
    the video is played "inline". If you omit this 
    attribute then it works normal in the desktop
    browsers, but for the mobile browsers, the video 
    takes the fullscreen by default. And don't forget
    to use the autoplay attribute-->
    <video id='video'
           width="600" 
           height="300" 
           autoplay='true'>
        Sorry, video element not supported in your browsers
    </video>
    <div id="error"></div>
    <div id="button-container">
        <button onclick="openCamera()"> Open Camera</button>
        <!-- Close Camera button -->
        <button onclick='closeCamera()'>Close Camera</button>
    </div>
    <script>


       
        const videoElem = document.getElementById('video');
        const errorElem = document.getElementById('error');
        let receivedMediaStream = null;
         videoElem.srcObject=null;

 



        async function openCamera() {
            const constraints = {audio: true, video:{width: "900", height: "500"}};
            window.streamm = null;
            
             
             // if (typeof streamm.getTracks() != 'null'){
             //     console.log(streamm.getTracks());
             //     streamm.getTracks().forEach(track => track.stop());
             // }
          
 this.stream = null;
  this.mediaDevices = navigator.mediaDevices;
  
           stream = this.mediaDevices.getUserMedia(constraints).then(mediaStream => {
                    window.streamm = null;
                    videoElem.srcObject = null;
                    videoElem.srcObject = mediaStream;
                    window.streamm = mediaStream;
                    videoElem.onloadedmetadata = function (e) {
                      video.play();
                };

                    console.log(mediaStream);     
                    receivedMediaStream = mediaStream;

                    // mediaStream.start();
                })


                // .catch(err => {
                //     // handling the error if any
                //     errorElem.innerHTML = err;
                //     errorElem.style.display = "block";
                // });
  
        }
  
  
        const closeCamera = () => {
            videoElem.srcObject=null;
            if (!receivedMediaStream) {
                errorElem.innerHTML = "Camera is already closed!";
                errorElem.style.display = "block";
            } else {
/* MediaStream.getTracks() returns an array of all the 
MediaStreamTracks being used in the received mediaStream
we can iterate through all the mediaTracks and 
stop all the mediaTracks by calling its stop() method*/
                receivedMediaStream.getTracks().forEach(mediaTrack => {
                    mediaTrack.stop();
                });
                errorElem.innerHTML = "Camera closed successfully!"
                errorElem.style.display = "block";
            }
        }
    </script>
</body>
  
</html>