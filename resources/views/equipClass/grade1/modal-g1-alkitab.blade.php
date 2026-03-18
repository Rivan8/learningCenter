@php
$assetBase = rtrim(request()->getBasePath(), '\/');
$videoFilesG1Alkitab = [
    'VideoG1-1.mp4',
    'VideoG1-2.mp4',
    'VideoG1-3.mp4',
    'VideoG1-4.mp4',
    'VideoG1-5.mp4',
    'VideoG1-6.mp4',
    'VideoG1-7.mp4',
    'VideoG1-8.mp4',
    'VideoG1-9.mp4',
    'VideoG1-10.mp4',
    
    
];
$videoTitlesG1Alkitab = [
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
$videoTitlesG1AlkitabBold = array_map(function($t) {
    return preg_replace('/^(Keselamatan|Baptisan)\s*-\s*/', '<strong>$1</strong> - ', $t);
}, $videoTitlesG1Alkitab);
// Speaker and description data
$videoSpeakersG1Alkitab = array_map(function($t) {
    return 'Tim Pengajar ESC';
}, $videoTitlesG1Alkitab);
$videoDescriptionsG1Alkitab = array_map(function($t) {
    $desc = preg_replace('/^(Keselamatan|Baptisan)\s*-\s*/', '', $t);
    return 'Penjelasan ringkas: ' . $desc;
}, $videoTitlesG1Alkitab);
$classInitial = 'G1-ALKITAB';    
@endphp

<div class="modal fade" id="modal-g1-alkitab" tabindex="-1" aria-labelledby="modal-g1-alkitabLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:1600px;width:98vw;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-g1-alkitabLabel">Daftar Video Grade 1 Alkitab</h5>
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
                <video id="videoG1Alkitab" controls style="width:100%;height:100%;background:#000;">
                  <source id="videoG1AlkitabSource" src="{{ $assetBase }}/assets/video/{{ rawurlencode($videoFilesG1Alkitab[0]) }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div id="videoG1AlkitabTitle" class="yt-title">{!! $videoTitlesG1AlkitabBold[0] !!}</div>
              <div class="yt-meta d-flex align-items-center gap-3">
                <div class="yt-avatar d-flex align-items-center justify-content-center">
                  <span class="yt-avatar-initial">{{ $classInitial }}</span>
                </div>
                <div class="yt-meta-text">
                  <div id="videoG1AlkitabSpeaker" class="yt-speaker">Pembicara: {{ $videoSpeakersG1Alkitab[0] }}</div>
                </div>
              </div>
              <div id="videoG1AlkitabDesc" class="yt-desc mt-2">{{ $videoDescriptionsG1Alkitab[0] }}</div>
              <div class="yt-desc mt-2">Setelah menyelesaikan video pembelajaran ini, Anda wajib mengisi kuis melalui tautan berikut sebagai syarat kelengkapan materi: <a href="https://myesc.id/" target="_blank">Kuis Grade 1 Alkitab</a></div>
          </div>
            <div class="col-lg-3 col-md-4">
              <ul class="list-group yt-sidebar" id="videoG1AlkitabList">
                @foreach($videoFilesG1Alkitab as $i => $file)
                  <li class="list-group-item video-list-item{{ $i === 0 ? ' active' : '' }}" id="videoG1AlkitabListItem{{ $i }}" onclick="setActiveVideoG1Alkitab({{ $i }})" style="cursor:pointer;">
                    <div class="yt-thumb">
                      <img class="yt-thumb-img" id="ytThumbImg{{ $i }}" alt="Thumbnail {{ $i+1 }}" src="{{ $assetBase }}/assets/thumbnail/thumb_{{ $i+1 }}.png" onerror="this.style.display='none'">
                      <div class="yt-play"></div>
                    </div>
                    <div class="yt-item-text">
                      <div class="yt-item-title">{!! $videoTitlesG1AlkitabBold[$i] !!}</div>
                      <div class="yt-item-meta">Grade 1 Alkitab • Video {{ $i+1 }}</div>
                    </div>
                  </li>
                @endforeach
              </ul>
              <script>
                function setActiveVideoG1Alkitab(idx) {
                  var files = @json($videoFilesG1Alkitab);
                  var titlesBold = @json($videoTitlesG1AlkitabBold);
                  var speakers = @json($videoSpeakersG1Alkitab);
                  var descriptions = @json($videoDescriptionsG1Alkitab);
                  document.getElementById('videoG1AlkitabSource').src = "{{ $assetBase }}/assets/video/" + encodeURIComponent(files[idx]);
                  document.getElementById('videoG1Alkitab').load();
                  document.getElementById('videoG1AlkitabTitle').innerHTML = titlesBold[idx];
                  document.getElementById('videoG1AlkitabSpeaker').innerText = 'Pembicara: ' + speakers[idx];
                  document.getElementById('videoG1AlkitabDesc').innerText = descriptions[idx];
                  var items = document.querySelectorAll('.video-list-item');
                  items.forEach(function(item){ item.classList.remove('active'); });
                  document.getElementById('videoG1AlkitabListItem'+idx).classList.add('active');
                  var videoEl = document.getElementById('videoG1Alkitab');
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
