@php
$assetBase = rtrim(request()->getBasePath(), '\/');
$videoFilesFC1 = [
    'VideoFc1-1.mp4',
    'VideoFc1-2.mp4',
    'VideoFc1-3.mp4',
    'VideoFc1-4.mp4',
    'VideoFc1-5.mp4',
    'VideoFc1-6.mp4',
    'VideoFc1-7.mp4',
    'VideoFc1-8.mp4',
    'VideoFc1-9.mp4',
    'VideoFc1-10.mp4',
    
    
];
$videoTitlesFC1 = [
    'Keselamatan - Pertanyaan Besar : Mengapa Tuhan yang Baik mengijinkan Kejahatan?',
    'Keselamatan - Apa itu Dosa?',
    'Keselamatan - Bagaimana caranya manusia diselamatkan?',
    'Keselamatan - Jaminan Keselamatan',
    'Baptisan - Mengapa Baptisan Penting?',
    'Baptisan - Apa itu Baptisan?',
    'Baptisan - Dasar Alkitabiah Baptisan',
    'Baptisan - Makna Rohani Baptisan',
    'Baptisan - Siapa yang perlu di baptiskan?',
    'Baptisan - Baptisan dan kehidupan selanjutnya',
    
];
// Bold kata kategori "Keselamatan" dan "Baptisan"
$videoTitlesFC1Bold = array_map(function($t) {
    return preg_replace('/^(Keselamatan|Baptisan)\s*-\s*/', '<strong>$1</strong> - ', $t);
}, $videoTitlesFC1);
// Speaker and description data
$videoSpeakersFC1 = array_map(function($t) {
    return 'Tim Pengajar ESC';
}, $videoTitlesFC1);
$videoDescriptionsFC1 = array_map(function($t) {
    $desc = preg_replace('/^(Keselamatan|Baptisan)\s*-\s*/', '', $t);
    return 'Penjelasan ringkas: ' . $desc;
}, $videoTitlesFC1);
$classInitial = 'FC1';
@endphp

<div class="modal fade" id="modalFc1" tabindex="-1" aria-labelledby="modalFc1Label" aria-hidden="true">
  <div class="modal-dialog" style="max-width:1600px;width:98vw;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFc1Label">Daftar Video Foundation Class 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <style>
          .yt-player {
            background: #000;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0,0,0,0.25);
          }
          .yt-title {
            font-weight: 700;
            font-size: 1.25rem;
            color: #111827;
            margin-top: 12px;
          }
          .yt-sidebar {
            max-height: 70vh;
            overflow-y: auto;
          }
          .video-list-item {
            display: flex;
            gap: 12px;
            align-items: center;
            border: none;
            padding: 10px 12px;
            background: #fff;
            transition: background 0.2s ease, transform 0.2s ease;
          }
          .video-list-item:hover {
            background: #f3f4f6;
            transform: translateY(-2px);
          }
          .video-list-item.active {
            background: #e0e7ff;
            color: #1f2937;
            border-left: 3px solid #2563eb;
          }
          .yt-thumb {
            width: 96px;
            height: 54px;
            border-radius: 8px;
            background: #000;
            position: relative;
            flex-shrink: 0;
          }
          .yt-thumb-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            display: block;
          }
          .yt-thumb::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.45), rgba(0,0,0,0.0));
            border-radius: 8px;
          }
          .yt-play {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            width: 22px;
            height: 22px;
            border-left: 22px solid #fff;
            border-top: 12px solid transparent;
            border-bottom: 12px solid transparent;
            opacity: 0.9;
          }
          .yt-item-text {
            display: flex;
            flex-direction: column;
            gap: 4px;
          }
          .yt-item-title {
            font-weight: 600;
            font-size: 0.95rem;
            color: #111827;
            line-height: 1.3;
          }
          .yt-item-meta {
            font-size: 0.8rem;
            color: #6b7280;
          }
          .yt-meta {
            margin-top: 6px;
          }
          .yt-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
            color: #fff;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 6px 16px rgba(79,70,229,0.25);
          }
          .yt-avatar-initial {
            letter-spacing: 0.5px;
          }
          .yt-speaker {
            font-size: 0.95rem;
            color: #374151;
            font-weight: 600;
          }
          .yt-desc {
            font-size: 0.92rem;
            color: #4b5563;
          }
        </style>
        <div class="row gx-4">
            <div class="col-lg-9 col-md-8 mb-3">
              <div class="yt-player ratio ratio-16x9">
                <video id="videoFc1" controls style="width:100%;height:100%;background:#000;">
                  <source id="videoFc1Source" src="{{ $assetBase }}/assets/video/{{ rawurlencode($videoFilesFC1[0]) }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div id="videoFc1Title" class="yt-title">{!! $videoTitlesFC1Bold[0] !!}</div>
              <div class="yt-meta d-flex align-items-center gap-3">
                <div class="yt-avatar d-flex align-items-center justify-content-center">
                  <span class="yt-avatar-initial">{{ $classInitial }}</span>
                </div>
                <div class="yt-meta-text">
                  <div id="videoFc1Speaker" class="yt-speaker">Pembicara: {{ $videoSpeakersFC1[0] }}</div>
                </div>
              </div>
              <div id="videoFc1Desc" class="yt-desc mt-2">{{ $videoDescriptionsFC1[0] }}</div>
              <div class="yt-desc mt-2">Setelah menyelesaikan video pembelajaran ini, Anda wajib mengisi kuis melalui tautan berikut sebagai syarat kelengkapan materi: <a href="https://myesc.id/" target="_blank">Kuis Foundation Class 1 & Baptisan</a></div>
          </div>
            <div class="col-lg-3 col-md-4">
              <ul class="list-group yt-sidebar" id="videoFc1List">
                @foreach($videoFilesFC1 as $i => $file)
                  <li class="list-group-item video-list-item{{ $i === 0 ? ' active' : '' }}" id="videoFc1ListItem{{ $i }}" onclick="setActiveVideoFc1({{ $i }})" style="cursor:pointer;">
                    <div class="yt-thumb">
                      <img class="yt-thumb-img" id="ytThumbImg{{ $i }}" alt="Thumbnail {{ $i+1 }}" src="{{ $assetBase }}/assets/thumbnail/thumb_{{ $i+1 }}.png" onerror="this.style.display='none'">
                      <div class="yt-play"></div>
                    </div>
                    <div class="yt-item-text">
                      <div class="yt-item-title">{!! $videoTitlesFC1Bold[$i] !!}</div>
                      <div class="yt-item-meta">Foundation Class 1 • Video {{ $i+1 }}</div>
                    </div>
                  </li>
                @endforeach
              </ul>
              <script>
                function setActiveVideoFc1(idx) {
                  var files = @json($videoFilesFC1);
                  var titlesBold = @json($videoTitlesFC1Bold);
                  var speakers = @json($videoSpeakersFC1);
                  var descriptions = @json($videoDescriptionsFC1);
                  document.getElementById('videoFc1Source').src = "{{ $assetBase }}/assets/video/" + encodeURIComponent(files[idx]);
                  document.getElementById('videoFc1').load();
                  document.getElementById('videoFc1Title').innerHTML = titlesBold[idx];
                  document.getElementById('videoFc1Speaker').innerText = 'Pembicara: ' + speakers[idx];
                  document.getElementById('videoFc1Desc').innerText = descriptions[idx];
                  var items = document.querySelectorAll('.video-list-item');
                  items.forEach(function(item){ item.classList.remove('active'); });
                  document.getElementById('videoFc1ListItem'+idx).classList.add('active');
                  var videoEl = document.getElementById('videoFc1');
                  var onLoaded = function(){
                    var playPromise = videoEl.play();
                    if (playPromise !== undefined) {
                      playPromise.catch(function() {});
                    }
                    videoEl.removeEventListener('loadeddata', onLoaded);
                  };
                  videoEl.addEventListener('loadeddata', onLoaded);
                }
              </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
