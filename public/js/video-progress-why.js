// Video Progress Tracking for Why Modal
let currentVideoIndexWhy = 0;
let videoProgressWhy = [];
let videoDurationsWhy = [];
let lastWatchedVideoWhy = 0;
const UNLOCK_THRESHOLD_WHY = 80; // Threshold untuk membuka video berikutnya

// Fungsi untuk mengganti video
function changeVideoWhy(videoFile, index, resumeTime = 0) {
  const video = document.getElementById('videoWhy');
  const source = document.getElementById('videoWhySource');

  if (!video || !source) {
    console.error('Video element not found');
    return;
  }

  console.log('Changing video to:', videoFile, 'index:', index, 'resumeTime:', resumeTime);

  // Pause video saat ini jika sedang diputar
  video.pause();

  // Cek ketersediaan video terlebih dahulu
  checkVideoAvailability(videoFile)
    .then(() => {
      // Update source dengan URL yang benar
      const videoUrl = (window.APP_BASE_URL ? window.APP_BASE_URL : '') + "/assets/video/" + videoFile;
      console.log('Video URL:', videoUrl);

      // Set source dan load video
      source.src = videoUrl;
      video.load();

      // Tambahkan error handling untuk source
      source.addEventListener('error', function(e) {
        console.error('Source error:', e);
        alert('Error loading video source: ' + videoFile);
      });
    })
    .catch(error => {
      console.error('Video not available:', error);
      alert('Video tidak tersedia: ' + videoFile + '\nError: ' + error.message);
    });

  // Tunggu video siap diputar
  video.addEventListener('loadeddata', function onLoadedData() {
    // Hapus event listener ini agar tidak terpanggil berulang
    video.removeEventListener('loadeddata', onLoadedData);

    console.log('Video loaded successfully:', videoFile);

    // Set waktu resume jika ada
    if (resumeTime > 0) {
      video.currentTime = resumeTime;
    }

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
          alert('Video tidak dapat diputar secara otomatis. Silakan klik tombol play manual.');
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

    alert(errorMessage);
  });

  // Update tampilan aktif
  updateActiveVideoWhy(index);

  // Update video info
  updateVideoInfo(index);

  // Update badge video-views
  const viewsElement = document.querySelector('.video-views');
  if (viewsElement) {
    viewsElement.textContent = `Video ${index + 1} dari ${window.videoFilesWhy.length}`;
  }

  currentVideoIndexWhy = index;
  lastWatchedVideoWhy = index;
}

// Fungsi untuk update tampilan video aktif
function updateActiveVideoWhy(index) {
  const listItems = document.querySelectorAll('#videoListWhy li');
  listItems.forEach((item, i) => {
    item.classList.remove('active-video');
    if (i === index) item.classList.add('active-video');
  });
}

// Fungsi untuk membuka video berikutnya
function unlockNextVideoWhy(index) {
  if (index >= 0 && index < window.videoFilesWhy.length - 1) {
    const nextIndex = index + 1;
    const listItem = document.getElementById(`video${nextIndex + 1}-why-list`);
    const link = document.getElementById(`video${nextIndex + 1}-why-link`);

    if (listItem && link) {
      listItem.classList.remove('disabled-video');
      link.classList.remove('text-muted');
      link.onclick = function() {
        changeVideoWhy(window.videoFilesWhy[nextIndex], nextIndex);
      };
    }
  }
}

function notifyLockedWhy(index) {
  alert('Anda harus menyelesaikan video sebelumnya sampai selesai untuk membuka video ini.');
}

// Fungsi untuk mengecek ketersediaan video
function checkVideoAvailability(videoFile) {
  return new Promise((resolve, reject) => {
    const videoUrl = (window.APP_BASE_URL ? window.APP_BASE_URL : '') + "/assets/video/" + videoFile;
    console.log('Checking video availability:', videoUrl);

    fetch(videoUrl, { method: 'HEAD' })
      .then(response => {
        if (response.ok) {
          console.log('Video available:', videoFile);
          resolve(true);
        } else {
          console.error('Video not found:', videoFile);
          reject(new Error('Video not found: ' + videoFile));
        }
      })
      .catch(error => {
        console.error('Error checking video:', error);
        reject(error);
      });
  });
}

// Fungsi untuk format durasi video
function formatDuration(seconds) {
  if (isNaN(seconds) || seconds === 0) return '--:--';

  const hours = Math.floor(seconds / 3600);
  const minutes = Math.floor((seconds % 3600) / 60);
  const secs = Math.floor(seconds % 60);

  if (hours > 0) {
    return `${hours}:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
  } else {
    return `${minutes}:${secs.toString().padStart(2, '0')}`;
  }
}

// Fungsi untuk update informasi video
function updateVideoInfo(index) {
  const videoTitles = window.videoTitlesWhy || [];
  const videoDescriptions = window.videoDescriptionsWhy || [];
  const videoSpeakers = window.videoSpeakersWhy || [];

  // Update title
  const titleElement = document.getElementById('videoTitleWhy');
  if (titleElement && videoTitles[index]) {
    titleElement.textContent = videoTitles[index];
  }

  // Update description
  const descElement = document.getElementById('videoDescriptionWhy');
  if (descElement && videoDescriptions[index]) {
    descElement.textContent = videoDescriptions[index];
  }

  // Update speaker
  const speakerElement = document.getElementById('videoSpeakerWhy');
  if (speakerElement && videoSpeakers[index]) {
    speakerElement.textContent = videoSpeakers[index];
  }

  // Update video counter
  const viewsElement = document.querySelector('.video-views');
  if (viewsElement) {
    viewsElement.textContent = `Video ${index + 1} dari ${window.videoFilesWhy.length}`;
  }
}

// Fungsi untuk menyimpan progress video ke database
// Fungsi untuk menyimpan progress video
function saveProgressWhy() {
  const videoPlayer = document.getElementById('videoWhy');
  if (!videoPlayer || videoPlayer.paused || !window.videoFilesWhy[currentVideoIndexWhy]) {
    return;
  }

  // Hitung persentase progress
  let progressPercentage = Math.round((videoPlayer.currentTime / videoPlayer.duration) * 100);

  // Jika video selesai, set progress ke 100%
  if (progressPercentage > 95) {
    progressPercentage = 100;
  }

  // Jika video sudah pernah selesai (100%), pertahankan status completed
  if (videoProgressWhy[currentVideoIndexWhy] >= 100) {
    progressPercentage = 100;
  }

  // Simpan progress ke database
  fetch('/api/video-progress', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({
      video_type: 'why',
      video_index: currentVideoIndexWhy,
      progress_percentage: progressPercentage,
      current_time: videoPlayer.currentTime,
      video_duration: videoPlayer.duration
    })
  })
  .then(response => response.json())
  .then(data => {
    console.log('Progress saved:', data);
    // Update videoProgressWhy array
    videoProgressWhy[currentVideoIndexWhy] = progressPercentage;
  })
  .catch(error => {
    console.error('Error saving progress:', error);
  });
}

// Fungsi untuk memuat progress dari database
function loadProgressWhy() {
  fetch('/api/video-progress?video_type=why', {
    method: 'GET',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
  })
  .then(response => {
    if (!response.ok) {
      // Jika unauthorized, redirect ke login atau tampilkan pesan
      if (response.status === 401) {
        alert('Sesi login Anda telah habis. Silakan login kembali.');
        window.location.href = '/login';
        return Promise.reject('Unauthorized');
      }
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    if (data.success && data.data.length > 0) {
      // Initialize progress array
      videoProgressWhy = new Array(window.videoFilesWhy.length).fill(0);

      // Simpan durasi video jika tersedia
      videoDurationsWhy = new Array(window.videoFilesWhy.length).fill(null);

      // Update progress dari database
      data.data.forEach(progress => {
        videoProgressWhy[progress.video_index] = progress.progress_percentage;

        // Simpan durasi video jika tersedia
        if (progress.video_duration) {
          videoDurationsWhy[progress.video_index] = progress.video_duration;
        }

        // Update progress bar
        const progressBar = document.getElementById(`progress-why-${progress.video_index}`);
        if (progressBar) {
          progressBar.style.width = `${progress.progress_percentage}%`;
          progressBar.setAttribute('aria-valuenow', progress.progress_percentage);
        }

        // Update video list item class & onclick
        const listItem = document.getElementById(`video${progress.video_index + 1}-why-list`);
        if (listItem) {
          listItem.classList.remove('locked');
          if (progress.progress_percentage >= 100) {
            listItem.classList.add('completed');
          }
          listItem.onclick = function() {
            changeVideoWhy(window.videoFilesWhy[progress.video_index], progress.video_index);
          };

          // Icon logic: hide lock, show check if completed
          const iconLock = listItem.querySelector('.icon-lock');
          const iconCheck = listItem.querySelector('.icon-check');
          const iconPlay = listItem.querySelector('.icon-play');
          if (iconLock) iconLock.style.display = 'none';
          if (iconCheck) iconCheck.style.display = (progress.progress_percentage >= 100) ? 'inline' : 'none';
          if (iconPlay) iconPlay.style.display = (progress.progress_percentage < 100) ? 'inline' : 'none';
        }
      });

      // Unlock next video if threshold met
      data.data.forEach(progress => {
        if (progress.progress_percentage >= UNLOCK_THRESHOLD_WHY && progress.video_index < window.videoFilesWhy.length - 1) {
          unlockNextVideoWhy(progress.video_index);
        }
      });

      // Get last watched video
      return fetch('/api/video-progress/last-watched?video_type=why');
    } else {
      // Initialize empty progress
      videoProgressWhy = new Array(window.videoFilesWhy.length).fill(0);
      videoDurationsWhy = new Array(window.videoFilesWhy.length).fill(null);
      return Promise.resolve({ json: () => Promise.resolve({ success: false }) });
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success && data.data) {
      // Resume from last watched video
      lastWatchedVideoWhy = data.data.video_index;
      currentVideoIndexWhy = lastWatchedVideoWhy;

      // Load the last watched video
      changeVideoWhy(window.videoFilesWhy[currentVideoIndexWhy], currentVideoIndexWhy, data.data.current_time);

      setTimeout(() => {
        alert(`Selamat datang kembali! Melanjutkan dari video ${currentVideoIndexWhy + 1}`);
      }, 500);
    } else {
      // Start from first video
      changeVideoWhy(window.videoFilesWhy[0], 0);
    }
  })
  .catch(error => {
    console.error('Error loading progress:', error);
    // Fallback to first video
    changeVideoWhy(window.videoFilesWhy[0], 0);
  });
}

// Initialize video progress tracking
function initVideoProgressWhy() {
  const modalWhy = document.getElementById('modalWhy');
  const videoPlayer = document.getElementById('videoWhy');

  if (modalWhy && videoPlayer) {
    console.log('Modal and video player found, setting up event listeners');

    // Event listener saat modal dibuka
    modalWhy.addEventListener('shown.bs.modal', function() {
      console.log('Modal shown, initializing video');

      // Reset video state
      videoPlayer.pause();
      videoPlayer.currentTime = 0;

      // Reset video list state
      const listItems = document.querySelectorAll('#videoListWhy li');
      listItems.forEach((item, i) => {
        item.classList.remove('active-video', 'completed-video');
        if (i === 0) {
          item.classList.add('active-video');
        } else {
          item.classList.add('disabled-video');
        }
      });

      // Reset progress bars
      listItems.forEach((item, i) => {
        const progressBar = document.getElementById(`progress-why-${i}`);
        if (progressBar) {
          progressBar.style.width = '0%';
          progressBar.setAttribute('aria-valuenow', '0');
        }
      });

      // Reset current index
      currentVideoIndexWhy = 0;

      // Load progress from database
      loadProgressWhy();
    });

    // Event listener saat modal ditutup
    modalWhy.addEventListener('hidden.bs.modal', function() {
      console.log('Modal hidden, pausing video');
      if (videoPlayer) {
        videoPlayer.pause();
        videoPlayer.currentTime = 0;
      }
    });

    // Event listener saat video selesai
    videoPlayer.addEventListener('ended', function() {
      console.log('Video ended, current index:', currentVideoIndexWhy);

      // Mark video as completed
      videoProgressWhy[currentVideoIndexWhy] = 100;
      const listItem = document.querySelectorAll('#videoListWhy li')[currentVideoIndexWhy];
      if (listItem) listItem.classList.add('completed-video');

      // Save progress
      saveProgressWhy();

      // Unlock next video
      unlockNextVideoWhy(currentVideoIndexWhy);

      // If not last video, play next video
      if (currentVideoIndexWhy < window.videoFilesWhy.length - 1) {
        setTimeout(() => {
          changeVideoWhy(window.videoFilesWhy[currentVideoIndexWhy + 1], currentVideoIndexWhy + 1);
        }, 1000);
      }
    });

    // Event listener untuk progress tracking
    videoPlayer.addEventListener('timeupdate', function() {
      if (videoPlayer.duration > 0) {
        const progress = (videoPlayer.currentTime / videoPlayer.duration) * 100;
        const progressBar = document.getElementById(`progress-why-${currentVideoIndexWhy}`);
        if (progressBar) {
          progressBar.style.width = progress + '%';
          progressBar.setAttribute('aria-valuenow', progress);
        }

        // Save progress periodically (every 5 seconds)
        if (Math.floor(videoPlayer.currentTime) % 5 === 0) {
          saveProgressWhy();
        }
      }
    });

    // Event listener untuk debugging
    videoPlayer.addEventListener('loadstart', () => console.log('Video load started'));
    videoPlayer.addEventListener('loadedmetadata', () => console.log('Video metadata loaded'));
    videoPlayer.addEventListener('canplay', () => console.log('Video can play'));
    videoPlayer.addEventListener('canplaythrough', () => console.log('Video can play through'));

    // Tambahan debugging untuk video loading
    videoPlayer.addEventListener('load', () => console.log('Video load event'));
    videoPlayer.addEventListener('loadeddata', () => console.log('Video loaded data'));
    videoPlayer.addEventListener('progress', () => console.log('Video progress'));
    videoPlayer.addEventListener('suspend', () => console.log('Video suspend'));
    videoPlayer.addEventListener('abort', () => console.log('Video abort'));
    videoPlayer.addEventListener('emptied', () => console.log('Video emptied'));
    videoPlayer.addEventListener('stalled', () => console.log('Video stalled'));
    videoPlayer.addEventListener('loadedmetadata', () => {
      console.log('Video duration:', videoPlayer.duration);
      console.log('Video videoWidth:', videoPlayer.videoWidth);
      console.log('Video videoHeight:', videoPlayer.videoHeight);

      // Simpan durasi video ke array
      videoDurationsWhy[currentVideoIndexWhy] = videoPlayer.duration;

      // Update durasi video
      const durationElement = document.getElementById('videoDurationWhy');
      if (durationElement) {
        durationElement.textContent = formatDuration(videoPlayer.duration);
      }
    });

    // Event listener untuk error handling yang lebih baik
    videoPlayer.addEventListener('stalled', () => console.log('Video stalled'));
    videoPlayer.addEventListener('waiting', () => console.log('Video waiting for data'));
    videoPlayer.addEventListener('playing', () => console.log('Video playing'));
    videoPlayer.addEventListener('pause', () => console.log('Video paused'));

  } else {
    console.error('Modal or video player not found');
    if (!modalWhy) console.error('Modal not found');
    if (!videoPlayer) console.error('Video player not found');
  }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
  initVideoProgressWhy();
});
