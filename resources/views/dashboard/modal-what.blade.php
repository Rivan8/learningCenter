
@php
  $videoFilesWhat = [
    'video1.mp4', // Video Pembuka
    'video2.mp4', // Video Pendahuluan
    'video3.mp4', // Video Ketiga
    'video4.mp4', // Video Keempat
    'video5.mp4'  // Video Kelima
  ];
  $videoTitlesWhat = ['Pembuka','Pendahuluan','Ketiga','Keempat','Kelima'];
  
  $baseUrl = rtrim(request()->getBaseUrl(), '/');
  $needsPublicPrefix = file_exists(base_path('index.php'));
  $assetBase = $needsPublicPrefix ? ($baseUrl . '/public') : $baseUrl;
  $classInitial = 'WHAT';
@endphp

<div class="modal fade" id="modalWhat" tabindex="-1" aria-labelledby="modalWhatLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:1600px;width:98vw;">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header border-bottom-0 bg-white pt-4 px-4">
        <h5 class="modal-title fw-bold" id="modalWhatLabel" style="color: #1e293b; font-size: 1.5rem;">Video Tutorial - What</h5>
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
          <!-- Video Section -->
          <div class="col-lg-9 col-md-8 mb-4">
            <div class="yt-player ratio ratio-16x9">
              <video id="videoWhat" controls preload="metadata" style="width: 100%; height: 100%;">
                <source id="videoWhatSource" src="{{ asset('assets/video/' . $videoFilesWhat[0]) }}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
              <div class="position-absolute" style="top: 20px; left: 20px; z-index: 10; opacity: 0.7;">
                <img src="{{ $assetBase }}/assets/img/kaiadmin/logo_light.svg" alt="Logo" style="max-width: 100px; height: auto;">
              </div>
            </div>
            
            <div id="videoWhatTitle" class="yt-title">Video {{ $videoTitlesWhat[0] }}</div>
            
            <div class="yt-meta-section d-flex align-items-center gap-3">
              <div class="yt-avatar">
                <span>{{ $classInitial }}</span>
              </div>
              <div>
                <h6 class="yt-speaker-name">Pembicara: Tim Pengajar ESC</h6>
                <span class="text-muted small">Materi Video Tutorial - What</span>
              </div>
            </div>
            
            <div id="videoWhatDesc" class="yt-video-desc">
              Silakan simak video pembelajaran ini sampai selesai untuk membuka materi berikutnya.
            </div>
          </div>

          <!-- Video List Section -->
          <div class="col-lg-3 col-md-4">
            <h6 class="fw-bold mb-3 px-2 text-uppercase small tracking-wider text-muted">Daftar Video</h6>
            <div class="yt-sidebar border-0" id="videoListWhat">
              @foreach($videoFilesWhat as $i => $file)
                <div class="video-list-item{{ $i === 0 ? ' active-video' : ' disabled-video' }}" id="video{{ $i+1 }}-what-list" 
                     onclick="{{ $i === 0 ? "changeVideoWhat('$file', $i)" : "notifyLockedWhat($i)" }}" style="cursor:pointer;">
                  <div class="yt-thumb">
                    <img class="yt-thumb-img" id="ytThumbImgWhat{{ $i }}" alt="Thumbnail {{ $i+1 }}" 
                         src="{{ $assetBase }}/assets/thumbnail/thumb_what_{{ $i+1 }}.png" 
                         onerror="this.src='https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=200&h=110&fit=crop'">
                    <div class="yt-play-overlay">
                      <div class="yt-play-icon">
                        <i class="fas {{ $i === 0 ? 'fa-play' : 'fa-lock' }}"></i>
                      </div>
                    </div>
                  </div>
                  <div class="yt-item-text">
                    <div class="yt-item-title" id="video{{ $i+1 }}-what-link-text">Video {{ $videoTitlesWhat[$i] }}</div>
                    <div class="yt-item-meta">Video {{ $i+1 }} • What</div>
                    <div class="yt-progress-container">
                      <div class="yt-progress-bar" id="progress-what-{{ $i }}"></div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function showSwal(message) {
  Swal.fire({
    icon: 'warning',
    title: 'Peringatan',
    text: message,
    confirmButtonColor: '#3b82f6'
  });
}
// === LOGIC VIDEO WHAT ===
let currentVideoIndexWhat = 0;
let maxTimeReachedWhat = 0;
const videoTypeWhat = 'WHAT';

// Fungsi untuk mengganti video
function changeVideoWhat(videoFile, index) {
  const video = document.getElementById('videoWhat');
  const source = document.getElementById('videoWhatSource');
  const videoTitles = @json($videoTitlesWhat);

  if (!video || !source) return;

  // Reset tracking percepatan
  maxTimeReachedWhat = 0;

  video.pause();
  source.src = "{{ asset('assets/video/') }}/" + videoFile;
  video.load();

  document.getElementById('videoWhatTitle').innerText = 'Video ' + videoTitles[index];

  video.addEventListener('loadeddata', function onLoadedData() {
    video.removeEventListener('loadeddata', onLoadedData);
    const playPromise = video.play();
    if (playPromise !== undefined) {
      playPromise.catch(error => {
        if (error.name !== 'NotAllowedError') {
          showSwal('Video tidak dapat diputar secara otomatis. Silakan klik tombol play manual.');
        }
      });
    }
  }, { once: true });

  const listItems = document.querySelectorAll('#videoListWhat .video-list-item');
  listItems.forEach((item, i) => {
    item.classList.remove('active-video');
    if (i === index) item.classList.add('active-video');
  });

  currentVideoIndexWhat = index;
}

function saveVideoProgressWhat(index, percentage, currentTime = 0) {
  fetch("{{ route('video.progress.update') }}", {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({
      video_type: videoTypeWhat,
      video_index: index,
      progress_percentage: Math.round(percentage),
      current_time: currentTime,
      video_duration: document.getElementById('videoWhat').duration
    })
  })
  .catch(error => console.error('Error saving progress:', error));
}

function loadVideoProgressWhat() {
  return fetch(`{{ route('video.progress.get') }}?video_type=${videoTypeWhat}`)
    .then(response => response.json())
    .then(result => {
      if (result.success && result.data) {
        const progressData = result.data;
        const listItems = document.querySelectorAll('#videoListWhat .video-list-item');
        
        progressData.forEach(item => {
          const idx = item.video_index;
          const percentage = item.progress_percentage;
          
          if (idx < listItems.length) {
            const listItem = document.getElementById(`video${idx + 1}-what-list`);
            const progressBar = document.getElementById(`progress-what-${idx}`);
            
            if (progressBar) progressBar.style.width = percentage + '%';
            if (percentage >= 100) {
              if (listItem) listItem.classList.add('completed-video');
              unlockNextVideoWhat(idx);
            }
          }
        });
      }
    })
    .catch(error => console.error('Error loading progress:', error));
}

// Fungsi untuk membuka video berikutnya
function unlockNextVideoWhat(index) {
  const videoFiles = @json($videoFilesWhat);
  if (index >= 0 && index < videoFiles.length - 1) {
    const nextIndex = index + 1;
    const listItem = document.getElementById(`video${nextIndex + 1}-what-list`);
    const playIcon = listItem.querySelector('.yt-play-icon i');

    if (listItem) {
      listItem.classList.remove('disabled-video');
      if (playIcon) {
        playIcon.classList.remove('fa-lock');
        playIcon.classList.add('fa-play');
      }
      listItem.onclick = function() {
        changeVideoWhat(videoFiles[nextIndex], nextIndex);
      };
    }
  }
}

function notifyLockedWhat(index) {
  showSwal('Anda harus menyelesaikan video sebelumnya sampai selesai untuk membuka video ini.');
}

// Event listener saat modal dibuka
document.addEventListener('DOMContentLoaded', function() {
  const modalWhat = document.getElementById('modalWhat');
  const videoPlayer = document.getElementById('videoWhat');
  const videoFiles = @json($videoFilesWhat);
  let lastSavedPercentage = 0;

  if (modalWhat && videoPlayer) {
    modalWhat.addEventListener('shown.bs.modal', function() {
      videoPlayer.pause();
      videoPlayer.currentTime = 0;
      maxTimeReachedWhat = 0;
      lastSavedPercentage = 0;

      const listItems = document.querySelectorAll('#videoListWhat .video-list-item');
      listItems.forEach((item, i) => {
        item.classList.remove('active-video', 'completed-video');
        if (i === 0) {
          item.classList.add('active-video');
          item.classList.remove('disabled-video');
          const playIcon = item.querySelector('.yt-play-icon i');
          if (playIcon) {
            playIcon.classList.remove('fa-lock');
            playIcon.classList.add('fa-play');
          }
          item.onclick = function() { changeVideoWhat(videoFiles[0], 0); };
        } else {
          item.classList.add('disabled-video');
          const playIcon = item.querySelector('.yt-play-icon i');
          if (playIcon) {
            playIcon.classList.remove('fa-play');
            playIcon.classList.add('fa-lock');
          }
          item.onclick = function() { notifyLockedWhat(i); };
        }
        
        const progressBar = document.getElementById(`progress-what-${i}`);
        if (progressBar) progressBar.style.width = '0%';
      });

      currentVideoIndexWhat = 0;
      loadVideoProgressWhat().then(() => {
        changeVideoWhat(videoFiles[0], 0);
      });
    });

    modalWhat.addEventListener('hidden.bs.modal', function() {
      if (videoPlayer) {
        videoPlayer.pause();
        videoPlayer.currentTime = 0;
      }
    });

    // Mencegah percepatan video
    videoPlayer.addEventListener('timeupdate', function() {
      if (videoPlayer.currentTime > maxTimeReachedWhat + 1.5) {
        videoPlayer.currentTime = maxTimeReachedWhat;
      } else {
        maxTimeReachedWhat = Math.max(maxTimeReachedWhat, videoPlayer.currentTime);
      }

      if (videoPlayer.duration > 0) {
        const progress = (videoPlayer.currentTime / videoPlayer.duration) * 100;
        const progressBar = document.getElementById(`progress-what-${currentVideoIndexWhat}`);
        if (progressBar) {
          progressBar.style.width = progress + '%';
        }

        // Save progress every 10%
        if (Math.floor(progress / 10) > Math.floor(lastSavedPercentage / 10)) {
          saveVideoProgressWhat(currentVideoIndexWhat, progress, videoPlayer.currentTime);
          lastSavedPercentage = progress;
        }
      }
    });

    videoPlayer.addEventListener('ended', function() {
      const listItems = document.querySelectorAll('#videoListWhat .video-list-item');
      const listItem = listItems[currentVideoIndexWhat];
      if (listItem) listItem.classList.add('completed-video');

      saveVideoProgressWhat(currentVideoIndexWhat, 100, videoPlayer.currentTime);
      unlockNextVideoWhat(currentVideoIndexWhat);

      if (currentVideoIndexWhat < videoFiles.length - 1) {
        setTimeout(() => {
          changeVideoWhat(videoFiles[currentVideoIndexWhat + 1], currentVideoIndexWhat + 1);
        }, 1000);
      }
    });
  }
});
</script>
