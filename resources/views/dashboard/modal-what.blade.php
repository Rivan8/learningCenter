
@php
  $videoFilesWhat = [
    'video1.mp4', // Video Pembuka
    'video2.mp4', // Video Pendahuluan
    'video3.mp4', // Video Ketiga
    'video4.mp4', // Video Keempat
    'video5.mp4'  // Video Kelima
  ];
$videoTitlesWhat = ['Pembuka','Pendahuluan','Ketiga','Keempat','Kelima'];
@endphp

<style>
/* Video Modal Specific Styles */
#modalWhat .active-video {
  background-color: #007bff !important;
  color: white !important;
  border-color: #007bff !important;
  font-weight: bold;
}

#modalWhat .active-video a {
  color: white !important;
  text-decoration: none;
}


#modalWhat .completed-video {
  background-color: #28a745 !important;
  color: white !important;
  border-color: #28a745 !important;
  position: relative;
}

#modalWhat .completed-video::after {
  content: "✓";
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  font-weight: bold;
}

#modalWhat .completed-video a {
  color: white !important;
  text-decoration: none;
}

#modalWhat #videoListWhat .list-group-item {
  cursor: pointer;
  transition: all 0.3s ease;
  border-radius: 8px;
  margin-bottom: 5px;
  padding: 10px;
}

#modalWhat #videoListWhat .list-group-item:hover:not(.disabled-video) {
  background-color: #e9ecef;
  transform: translateY(-1px);
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

#modalWhat #videoListWhat .list-group-item a {
  display: block;
  padding: 5px 0;
  text-decoration: none;
  font-size: 14px;
}

#modalWhat .progress {
  background-color: rgba(0,0,0,0.1);
  border-radius: 10px;
  overflow: hidden;
}

#modalWhat .progress-bar {
  background-color: #007bff;
  transition: width 0.3s ease;
  border-radius: 10px;
}

/* Video player styling */
#modalWhat #videoWhat {
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

#modalWhat .modal-content {
  border-radius: 12px;
  border: none;
  box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

#modalWhat .modal-header {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border-radius: 12px 12px 0 0;
}

#modalWhat .modal-title {
  font-weight: 600;
}

#modalWhat .btn-close {
  filter: invert(1);
}
</style>

<!-- Modal What -->
@php
  $baseUrl = rtrim(request()->getBaseUrl(), '/');
  $needsPublicPrefix = file_exists(base_path('index.php'));
  $assetBase = $needsPublicPrefix ? ($baseUrl . '/public') : $baseUrl;
@endphp

<div class="modal fade" id="modalWhat" tabindex="-1" aria-labelledby="modalWhatLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="max-width: 90%; height: 95vh;">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-header">
        <h5 class="modal-title" id="modalWhatLabel">Video Tutorial - What</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="height: calc(100% - 120px); overflow-y: auto;">
        <div class="row">
          <!-- Video Section -->
          <div class="col-md-10 mb-4">
            <div class="position-relative">
              <div class="ratio ratio-16x9">
                <video id="videoWhat" controls preload="metadata" style="width: 100%; height: 100%;">
                  <source id="videoWhatSource" src="{{ asset('assets/video/' . $videoFilesWhat[0]) }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="position-absolute" style="top: 15px; left: 15px; z-index: 10; opacity: 0.8;">
                <img src="{{ $assetBase }}/assets/img/kaiadmin/logo_light.svg" alt="Logo" style="max-width: 120px; height: auto;">
              </div>
            </div>
          </div>
          <!-- Video List Section -->
          <div class="col-md-2">
            <ul class="text-center list-group" id="videoListWhat">
              @foreach($videoFilesWhat as $i => $file)
                <li class="list-group-item{{ $i === 0 ? ' active-video' : '' }}" id="video{{ $i+1 }}-what-list">
                  <a href="javascript:void(0)" id="video{{ $i+1 }}-what-link" onclick="changeVideoWhat('{{ $file }}', {{ $i }})">Video {{ $videoTitlesWhat[$i] }}</a>
                  <div class="progress mt-1" style="height: 5px;">
                    <div class="progress-bar" id="progress-what-{{ $i }}" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function showSwal(message) {
  Swal.fire({
    icon: 'warning',
    title: 'Peringatan',
    text: message,
    confirmButtonColor: '#667eea'
  });
}
// === LOGIC VIDEO WHAT ===
let currentVideoIndexWhat = 0;

// Fungsi untuk mengganti video
function changeVideoWhat(videoFile, index) {
  const video = document.getElementById('videoWhat');
  const source = document.getElementById('videoWhatSource');

  if (!video || !source) {
    console.error('Video element not found');
    return;
  }

  console.log('Changing video to:', videoFile, 'index:', index);

  // Pause video saat ini jika sedang diputar
  video.pause();

  // Update source dengan URL yang benar
  const videoUrl = "{{ asset('assets/video/') }}/" + videoFile;
  console.log('Video URL:', videoUrl);

  source.src = videoUrl;

  // Load video baru
  video.load();

  // Tunggu video siap diputar
  video.addEventListener('loadeddata', function onLoadedData() {
    // Hapus event listener ini agar tidak terpanggil berulang
    video.removeEventListener('loadeddata', onLoadedData);

    console.log('Video loaded successfully:', videoFile);

    // Coba putar video dengan handling autoplay policy
    const playPromise = video.play();

    if (playPromise !== undefined) {
      playPromise.then(() => {
        console.log('Video started playing successfully');
      }).catch(error => {
        console.log("Error playing video:", error);

        // Jika error karena autoplay policy, tampilkan pesan yang informatif
        if (error.name === 'NotAllowedError') {
          console.log('Autoplay blocked by browser policy');
          // Tidak perlu alert, user bisa klik play manual
        } else {
          // Untuk error lain, tampilkan pesan
          showSwal('Video tidak dapat diputar secara otomatis. Silakan klik tombol play manual.');
        }
      });
    }
  }, { once: true });

  // Tambahkan error handling
  video.addEventListener('error', function(e) {
    console.error('Video error:', e);
    console.error('Video error details:', video.error);

    let errorMessage = 'Terjadi kesalahan saat memuat video.';

    if (video.error) {
      switch(video.error.code) {
        case 1:
          errorMessage = 'Video tidak dapat dimuat. File mungkin tidak ada atau rusak.';
          break;
        case 2:
          errorMessage = 'Jaringan bermasalah. Silakan cek koneksi internet Anda.';
          break;
        case 3:
          errorMessage = 'Video tidak dapat diputar. Format tidak didukung.';
          break;
        case 4:
          errorMessage = 'Video tidak dapat diputar.';
          break;
      }
    }

    showSwal(errorMessage);
  });

  // Update tampilan aktif
  const listItems = document.querySelectorAll('#videoListWhat li');
  listItems.forEach((item, i) => {
    item.classList.remove('active-video');
    if (i === index) item.classList.add('active-video');
  });

  currentVideoIndexWhat = index;
}

// Fungsi untuk membuka video berikutnya
function unlockNextVideoWhat(index) {
  if (index >= 0 && index < @json($videoFilesWhat).length - 1) {
    const nextIndex = index + 1;
    const listItem = document.getElementById(`video${nextIndex + 1}-what-list`);
    const link = document.getElementById(`video${nextIndex + 1}-what-link`);

    if (listItem && link) {
      listItem.classList.remove('disabled-video');
      link.classList.remove('text-muted');
      link.onclick = function() {
        changeVideoWhat(@json($videoFilesWhat)[nextIndex], nextIndex);
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

  if (modalWhat && videoPlayer) {
    console.log('Modal and video player found, setting up event listeners');

    // Event listener saat modal dibuka
    modalWhat.addEventListener('shown.bs.modal', function() {
      console.log('Modal shown, initializing video');

      // Reset video state
      videoPlayer.pause();
      videoPlayer.currentTime = 0;

      // Reset video list state
      const listItems = document.querySelectorAll('#videoListWhat li');
      listItems.forEach((item, i) => {
        item.classList.remove('active-video', 'completed-video');
        if (i === 0) {
          item.classList.add('active-video');
        }
      });

      // Reset progress bars
      listItems.forEach((item, i) => {
        const progressBar = document.getElementById(`progress-what-${i}`);
        if (progressBar) {
          progressBar.style.width = '0%';
          progressBar.setAttribute('aria-valuenow', '0');
        }
      });

      // Reset current index
      currentVideoIndexWhat = 0;

      // Load first video
      setTimeout(() => {
        const firstVideo = @json($videoFilesWhat)[0];
        console.log('Loading first video:', firstVideo);
        changeVideoWhat(firstVideo, 0);
      }, 300);
    });

    // Event listener saat modal ditutup
    modalWhat.addEventListener('hidden.bs.modal', function() {
      console.log('Modal hidden, pausing video');
      if (videoPlayer) {
        videoPlayer.pause();
        videoPlayer.currentTime = 0;
      }
    });

    // Event listener saat video selesai
    videoPlayer.addEventListener('ended', function() {
      console.log('Video ended, current index:', currentVideoIndexWhat);

      // Tandai video saat ini sebagai selesai
      const listItem = document.querySelectorAll('#videoListWhat li')[currentVideoIndexWhat];
      if (listItem) listItem.classList.add('completed-video');

      // Buka video berikutnya
      unlockNextVideoWhat(currentVideoIndexWhat);

      // Jika bukan video terakhir, putar video berikutnya
      if (currentVideoIndexWhat < @json($videoFilesWhat).length - 1) {
        setTimeout(() => {
          changeVideoWhat(@json($videoFilesWhat)[currentVideoIndexWhat + 1], currentVideoIndexWhat + 1);
        }, 1000);
      }
    });

    // Event listener untuk progress tracking
    videoPlayer.addEventListener('timeupdate', function() {
      if (videoPlayer.duration > 0) {
        const progress = (videoPlayer.currentTime / videoPlayer.duration) * 100;
            const progressBar = document.getElementById(`progress-what-${currentVideoIndexWhat}`);
        if (progressBar) {
          progressBar.style.width = progress + '%';
          progressBar.setAttribute('aria-valuenow', progress);
        }
      }
    });

    // Event listener untuk debugging
    videoPlayer.addEventListener('loadstart', () => console.log('Video load started'));
    videoPlayer.addEventListener('loadedmetadata', () => console.log('Video metadata loaded'));
    videoPlayer.addEventListener('canplay', () => console.log('Video can play'));
    videoPlayer.addEventListener('canplaythrough', () => console.log('Video can play through'));

    // Event listener untuk error handling yang lebih baik
    videoPlayer.addEventListener('stalled', () => console.log('Video stalled'));
    videoPlayer.addEventListener('waiting', () => console.log('Video waiting for data'));
    videoPlayer.addEventListener('playing', () => console.log('Video playing'));
    videoPlayer.addEventListener('pause', () => console.log('Video paused'));

  } else {
    console.error('Modal or video player not found');
    if (!modalWhat) console.error('Modal not found');
    if (!videoPlayer) console.error('Video player not found');
  }
});
</script>
