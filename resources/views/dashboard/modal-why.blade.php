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
    'Introduction - Church Vision',
    'The Why - Mengapa Memuridkan',
    'The What - Disciples Community',
    'The How I - Dasar Pemuridan',
    'Membangun Hubungan dalam Komunitas',
    'Menyimak Secara Aktif dan Empati',
    'Bertanya dengan Baik dan Terarah',
    'DM - Gembala dan Kepemimpinan',
    'Greetings - Penutup'
];

// Bold prefix for better readability
$videoTitlesWhyBold = array_map(function($t) {
    return preg_replace('/^(.*?)\s*-\s*/', '<strong>$1</strong> - ', $t);
}, $videoTitlesWhy);

// Speaker and description data
$videoSpeakersWhy = array_map(function($t) {
    return 'Tim Pengajar ESC';
}, $videoTitlesWhy);

$videoDescriptionsWhy = array_map(function($t) {
    $desc = preg_replace('/^(.*?)\s*-\s*/', '', $t);
    return 'Materi pembelajaran: ' . $desc;
}, $videoTitlesWhy);

$classInitial = 'CTT';    
@endphp

<div class="modal fade" id="modalWhy" tabindex="-1" aria-labelledby="modalWhyLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:1600px;width:98vw;">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header border-bottom-0 bg-white pt-4 px-4">
        <h5 class="modal-title fw-bold" id="modalWhyLabel" style="color: #1e293b; font-size: 1.5rem;">Daftar Video CTT</h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <style>
          .yt-player {
            background: #000;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            position: relative;
          }
          .yt-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: #1e293b;
            margin-top: 20px;
            line-height: 1.4;
          }
          .yt-sidebar {
            max-height: 75vh;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f8fafc;
          }
          .yt-sidebar::-webkit-scrollbar {
            width: 6px;
          }
          .yt-sidebar::-webkit-scrollbar-track {
            background: #f8fafc;
          }
          .yt-sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
          }
          .video-list-item {
            display: flex;
            gap: 12px;
            align-items: center;
            border: none;
            padding: 12px;
            background: transparent;
            border-radius: 12px;
            margin-bottom: 8px;
            transition: all 0.3s ease;
            position: relative;
          }
          .video-list-item:hover:not(.disabled-video) {
            background: #f1f5f9;
            transform: translateX(4px);
          }
          .video-list-item.active-video {
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
          }
          .video-list-item.completed-video::after {
            content: "✓";
            position: absolute;
            right: 12px;
            top: 12px;
            background: #10b981;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.3);
          }
          .yt-thumb {
            width: 120px;
            height: 68px;
            border-radius: 10px;
            background: #1e293b;
            position: relative;
            flex-shrink: 0;
            overflow: hidden;
          }
          .yt-thumb-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.85;
            transition: all 0.3s ease;
          }
          .video-list-item:hover:not(.disabled-video) .yt-thumb-img {
            opacity: 1;
            transform: scale(1.05);
          }
          .yt-play-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0,0,0,0.2);
            opacity: 0;
            transition: all 0.3s ease;
          }
          .video-list-item:hover:not(.disabled-video) .yt-play-overlay {
            opacity: 1;
          }
          .yt-play-icon {
            width: 28px;
            height: 28px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3b82f6;
            font-size: 10px;
          }
          .yt-item-text {
            display: flex;
            flex-direction: column;
            gap: 2px;
            overflow: hidden;
            flex-grow: 1;
          }
          .yt-item-title {
            font-weight: 600;
            font-size: 0.95rem;
            color: #334155;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
          }
          .yt-item-meta {
            font-size: 0.8rem;
            color: #64748b;
          }
          .disabled-video {
            opacity: 0.6;
            cursor: not-allowed !important;
          }
          .disabled-video .yt-play-overlay {
            opacity: 1;
            background: rgba(0,0,0,0.4);
          }
          .disabled-video .yt-play-icon {
            color: #64748b;
          }
          .yt-meta-section {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #f1f5f9;
          }
          .yt-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: #fff;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
          }
          .yt-speaker-name {
            font-size: 1rem;
            color: #1e293b;
            font-weight: 600;
            margin: 0;
          }
          .yt-video-desc {
            font-size: 0.95rem;
            color: #475569;
            margin-top: 12px;
            background: #f8fafc;
            padding: 15px;
            border-radius: 12px;
            line-height: 1.6;
          }
          .yt-progress-container {
            margin-top: 4px;
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            overflow: hidden;
          }
          .yt-progress-bar {
            height: 100%;
            background: #3b82f6;
            width: 0%;
            transition: width 0.3s ease;
          }
          .active-video .yt-progress-bar {
            background: #2563eb;
          }
          .completed-video .yt-progress-bar {
            background: #10b981;
          }
        </style>
        <div class="row gx-4">
            <div class="col-lg-9 col-md-8 mb-4">
              <div class="yt-player ratio ratio-16x9">
                <video id="videoWhy" controls style="width:100%;height:100%;">
                  <source id="videoWhySource" src="{{ $assetBase }}/assets/video/{{ rawurlencode($videoFilesWhy[0]) }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div id="videoWhyTitle" class="yt-title">{!! $videoTitlesWhyBold[0] !!}</div>
              
              <div class="yt-meta-section d-flex align-items-center gap-3">
                <div class="yt-avatar">
                  <span>{{ $classInitial }}</span>
                </div>
                <div>
                  <h6 id="videoWhySpeaker" class="yt-speaker-name">Pembicara: {{ $videoSpeakersWhy[0] }}</h6>
                  <span class="text-muted small">Materi Core Team Training</span>
                </div>
              </div>
              
              <div id="videoWhyDesc" class="yt-video-desc">
                {{ $videoDescriptionsWhy[0] }}
              </div>
          </div>
          
            <div class="col-lg-3 col-md-4">
              <h6 class="fw-bold mb-3 px-2 text-uppercase small tracking-wider text-muted">Materi Selanjutnya</h6>
              <div class="yt-sidebar list-group border-0" id="videoWhyList">
                @foreach($videoFilesWhy as $i => $file)
                  <div class="video-list-item{{ $i === 0 ? ' active-video' : ' disabled-video' }}" id="videoWhyListItem{{ $i }}" 
                       onclick="{{ $i === 0 ? "setActiveVideoWhy($i)" : "notifyLockedWhy($i)" }}" style="cursor:pointer;">
                    <div class="yt-thumb">
                      <img class="yt-thumb-img" id="ytThumbImgWhy{{ $i }}" alt="Thumbnail {{ $i+1 }}" src="{{ $assetBase }}/assets/thumbnail/dc/dc-{{ $i+1 }}.png" onerror="this.src='https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=200&h=110&fit=crop'">
                      <div class="yt-play-overlay">
                        <div class="yt-play-icon">
                          <i class="fas {{ $i === 0 ? 'fa-play' : 'fa-lock' }}"></i>
                        </div>
                      </div>
                    </div>
                    <div class="yt-item-text">
                      <div class="yt-item-title">{!! $videoTitlesWhyBold[$i] !!}</div>
                      <div class="yt-item-meta">Video {{ $i+1 }} • CTT</div>
                      <div class="yt-progress-container">
                        <div class="yt-progress-bar" id="progress-why-{{ $i }}"></div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              
              <script>
                // === LOGIC VIDEO WHY ===
                let currentVideoIndexWhy = 0;
                let maxTimeReachedWhy = 0;

                function setActiveVideoWhy(idx) {
                  var files = @json($videoFilesWhy);
                  var titlesBold = @json($videoTitlesWhyBold);
                  var speakers = @json($videoSpeakersWhy);
                  var descriptions = @json($videoDescriptionsWhy);
                  
                  var videoEl = document.getElementById('videoWhy');
                  var sourceEl = document.getElementById('videoWhySource');
                  
                  // Reset tracking percepatan
                  maxTimeReachedWhy = 0;
                  
                  sourceEl.src = "{{ $assetBase }}/assets/video/" + encodeURIComponent(files[idx]);
                  videoEl.load();
                  
                  document.getElementById('videoWhyTitle').innerHTML = titlesBold[idx];
                  document.getElementById('videoWhySpeaker').innerText = 'Pembicara: ' + speakers[idx];
                  document.getElementById('videoWhyDesc').innerText = descriptions[idx];
                  
                  var items = document.querySelectorAll('#videoWhyList .video-list-item');
                  items.forEach(function(item){ item.classList.remove('active-video'); });
                  document.getElementById('videoWhyListItem'+idx).classList.add('active-video');
                  
                  currentVideoIndexWhy = idx;

                  var onLoaded = function(){
                    var playPromise = videoEl.play();
                    if (playPromise !== undefined) {
                      playPromise.catch(function(err) {
                        console.warn('Autoplay dicegah:', err);
                      });
                    }
                    videoEl.removeEventListener('loadeddata', onLoaded);
                  };
                  videoEl.addEventListener('loadeddata', onLoaded);
                }

                function unlockNextVideoWhy(index) {
                  const videoFiles = @json($videoFilesWhy);
                  if (index >= 0 && index < videoFiles.length - 1) {
                    const nextIndex = index + 1;
                    const listItem = document.getElementById(`videoWhyListItem${nextIndex}`);
                    const playIcon = listItem.querySelector('.yt-play-icon i');

                    if (listItem) {
                      listItem.classList.remove('disabled-video');
                      if (playIcon) {
                        playIcon.classList.remove('fa-lock');
                        playIcon.classList.add('fa-play');
                      }
                      listItem.onclick = function() {
                        setActiveVideoWhy(nextIndex);
                      };
                    }
                  }
                }

                function notifyLockedWhy(index) {
                  Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Anda harus menyelesaikan video sebelumnya sampai selesai untuk membuka video ini.',
                    confirmButtonColor: '#3b82f6'
                  });
                }

                // Inisialisasi event listener video
                document.addEventListener('DOMContentLoaded', function() {
                  const videoPlayer = document.getElementById('videoWhy');
                  const modalWhy = document.getElementById('modalWhy');

                  if (videoPlayer) {
                    // Mencegah percepatan video
                    videoPlayer.addEventListener('timeupdate', function() {
                      if (videoPlayer.currentTime > maxTimeReachedWhy + 1.5) {
                        videoPlayer.currentTime = maxTimeReachedWhy;
                      } else {
                        maxTimeReachedWhy = Math.max(maxTimeReachedWhy, videoPlayer.currentTime);
                      }

                      // Update progress bar
                      if (videoPlayer.duration > 0) {
                        const progress = (videoPlayer.currentTime / videoPlayer.duration) * 100;
                        const progressBar = document.getElementById(`progress-why-${currentVideoIndexWhy}`);
                        if (progressBar) {
                          progressBar.style.width = progress + '%';
                        }
                      }
                    });

                    // Video Selesai
                    videoPlayer.addEventListener('ended', function() {
                      const listItem = document.getElementById(`videoWhyListItem${currentVideoIndexWhy}`);
                      if (listItem) listItem.classList.add('completed-video');

                      unlockNextVideoWhy(currentVideoIndexWhy);

                      const videoFiles = @json($videoFilesWhy);
                      if (currentVideoIndexWhy < videoFiles.length - 1) {
                        setTimeout(() => {
                          setActiveVideoWhy(currentVideoIndexWhy + 1);
                        }, 1000);
                      }
                    });

                    // Reset state saat modal dibuka
                    if (modalWhy) {
                      modalWhy.addEventListener('shown.bs.modal', function() {
                        maxTimeReachedWhy = 0;
                        currentVideoIndexWhy = 0;
                        
                        const listItems = document.querySelectorAll('#videoWhyList .video-list-item');
                        listItems.forEach((item, i) => {
                          item.classList.remove('active-video', 'completed-video');
                          if (i === 0) {
                            item.classList.add('active-video');
                          } else {
                            item.classList.add('disabled-video');
                            const playIcon = item.querySelector('.yt-play-icon i');
                            if (playIcon) {
                              playIcon.classList.remove('fa-play');
                              playIcon.classList.add('fa-lock');
                            }
                            item.onclick = function() { notifyLockedWhy(i); };
                          }
                          const progressBar = document.getElementById(`progress-why-${i}`);
                          if (progressBar) progressBar.style.width = '0%';
                        });

                        setActiveVideoWhy(0);
                      });

                      modalWhy.addEventListener('hidden.bs.modal', function() {
                        videoPlayer.pause();
                        videoPlayer.currentTime = 0;
                      });
                    }
                  }
                });
              </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
