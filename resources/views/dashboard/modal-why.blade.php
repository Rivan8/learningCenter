@php
$assetBase = rtrim(request()->getBasePath(), '\/');
$videoFilesWhy = [
    'Video-1.mp4',
    'Video-2.mp4',
    'Video-3.mp4',
    'Video-4.mp4',
    'Video-5.mp4',
    'Video-6.mp4',
    'Video-7.mp4',
    'Video-8.mp4',
    'Video-9.mp4',
];
$videoTitlesWhy = [
    'Introduction-Church Vision',
    'The Why - Mengapa Memuridkan',
    'The What - Disciples Community',
    'The How I',
    'Membangun Hubungan',
    'Menyimak Secara Aktif',
    'Bertanya dengan Baik',
    'DM - Gembala',
    'Greetings'
];
@endphp

<div class="modal fade" id="modalWhy" tabindex="-1" aria-labelledby="modalWhyLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:1600px;width:98vw;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalWhyLabel">Daftar Video CTT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-9 col-md-8 mb-3">
              <div class="ratio ratio-16x9" style="background:#000;border-radius:12px;overflow:hidden;">
                <video id="videoWhy" controls style="width:100%;height:100%;background:#000;">
                  <source id="videoWhySource" src="{{ $assetBase }}/assets/video/{{ rawurlencode($videoFilesWhy[0]) }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <h4 id="videoWhyTitle" class="mt-3 mb-2" style="font-weight:600;color:#222;">{{ $videoTitlesWhy[0] }}</h4>
          </div>
            <div class="col-lg-3 col-md-4">
              <ul class="list-group" id="videoWhyList">
                @foreach($videoFilesWhy as $i => $file)
                  <li class="list-group-item video-list-item{{ $i === 0 ? ' active' : '' }}" id="videoWhyListItem{{ $i }}" style="cursor:pointer;transition:background 0.2s;" onclick="setActiveVideoWhy({{ $i }})">
                    <span style="font-weight:500;font-size:1.05rem;">{{ $videoTitlesWhy[$i] }}</span>
                  </li>
                @endforeach
              </ul>
              <style>
                .video-list-item.active {
                  background: #2563eb;
                  color: #fff;
                  border-color: #1e40af;
                  box-shadow: 0 2px 8px 0 rgba(37,99,235,0.10);
                  transform: scale(1.03);
                }
                .video-list-item:hover {
                  background: #e0e7ff;
                  color: #2563eb;
                }
              </style>
              <script>
                function setActiveVideoWhy(idx) {
                  var files = @json($videoFilesWhy);
                  var titles = @json($videoTitlesWhy);
                  var videoEl = document.getElementById('videoWhy');
                  var sourceEl = document.getElementById('videoWhySource');
                  sourceEl.src = "{{ $assetBase }}/assets/video/" + encodeURIComponent(files[idx]);
                  videoEl.load();
                  document.getElementById('videoWhyTitle').innerText = titles[idx];
                  var items = document.querySelectorAll('.video-list-item');
                  items.forEach(function(item){ item.classList.remove('active'); });
                  document.getElementById('videoWhyListItem'+idx).classList.add('active');
                  // Play saat data sudah siap, tangani promise play
                  var onLoaded = function(){
                    var playPromise = videoEl.play();
                    if (playPromise !== undefined) {
                      playPromise.then(function() {
                        // started
                      }).catch(function(err) {
                        console.warn('Gagal autoplay video:', err);
                      });
                    }
                    videoEl.removeEventListener('loadeddata', onLoaded);
                  };
                  videoEl.addEventListener('loadeddata', onLoaded);
                  var onError = function(e){
                    alert('Gagal memuat video: ' + files[idx]);
                    videoEl.removeEventListener('error', onError);
                  };
                  videoEl.addEventListener('error', onError, { once: true });
                }
              </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
