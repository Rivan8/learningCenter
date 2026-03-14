{{-- <!-- Modal New -->


<!-- modal Equip Plant -->
<div class="modal fade" id="modalEquipPlant" tabindex="-1" aria-labelledby="modalEquipPlantLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="max-width: 95%; height: 95vh;">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-body" style="height: calc(100% - 120px); overflow-y: auto; background: linear-gradient(120deg, #f6f8fa 60%, #e3f2fd 100%);">
        <div class="row g-4">
          <!-- Video Player - Left Side -->
          <div class="col-md-8">
            <div class="card shadow-lg border-0 h-100">
              <div class="position-relative">
                <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                  <iframe id="mainVideoPlayer" src="https://youtube.com/embed/aic7WQaozcY" title="YouTube video" allowfullscreen style="border-radius: 12px 12px 0 0;"></iframe>
                </div>
                <div class="position-absolute" style="top: 15px; left: 15px; z-index: 10; opacity: 0.8;">
                  <img src="{{ asset('assets/img/kaiadmin/DCT.png') }}" alt="Logo" style="max-width: 120px; height: auto;">
                </div>
              </div>
              <div class="p-4">
                <h5 id="videoTitle" class="mb-2 fw-bold text-primary">Foundation Class 3 - Pemulihan Hati Bapa -  Ps. Johanes Johari</h5>
                <p id="videoDescription" class="text-muted mb-0">Deskripsi video akan muncul di sini...</p>
              </div>
            </div>
          </div>

          <!-- Video List - Right Side -->
          <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
              <div class="card-header bg-white border-bottom-0 pb-2">
                <h6 class="mb-0 fw-bold text-secondary">Daftar Video</h6>
              </div>
              <div class="card-body pt-2 video-list" style="max-height: 70vh; overflow-y: auto;">
                <!-- Video Items -->
                <div class="video-item mb-3 p-2 border-0 rounded-3 cursor-pointer d-flex align-items-center bg-white shadow-sm" onclick="changeVideo('aic7WQaozcY', 'Foundation Class 3 - Pemulihan Hati Bapa -  Ps. Johanes', 'Kelas Foundation Class 3 - Pemulihan Hati Bapa -  Ps. Johanes')">
                  <img src="https://img.youtube.com/vi/aic7WQaozcY/mqdefault.jpg" alt="Thumbnail 1" class="me-3 rounded-2 border" style="width: 80px; height: 60px; object-fit: cover;">
                  <div>
                    <h6 class="mb-1 fw-bold">Foundation Class 3 - Pemulihan Hati Bapa -  Ps. Johanes </h6>
                    <small class="text-muted">Foundation Class 3 - Pemulihan Hati Bapa -  Ps. Johanes </small>
                  </div>
                </div>

                <div class="video-item mb-3 p-2 border-0 rounded-3 cursor-pointer d-flex align-items-center bg-white shadow-sm" onclick="changeVideo('prkDenNzSlo', 'Kelas Foundation Class 3 - Pemulihan Gambar Diri - Imelda Blegur', 'Kelas Foundation Class 3 - Pemulihan Gambar Diri - Imelda Blegur')">
                  <img src="https://img.youtube.com/vi/prkDenNzSlo/mqdefault.jpg" alt="Thumbnail 2" class="me-3 rounded-2 border" style="width: 80px; height: 60px; object-fit: cover;">
                  <div>
                    <h6 class="mb-1 fw-bold">Foundation Class 3 - Pemulihan Gambar Diri - Imelda Blegur</h6>
                    <small class="text-muted">Foundation Class 3 - Pemulihan Gambar Diri - Imelda Blegur</small>
                  </div>
                </div>

                <div class="video-item mb-3 p-2 border-0 rounded-3 cursor-pointer d-flex align-items-center bg-white shadow-sm" onclick="changeVideo('aIcCk-0DPlo', 'Video 3 - Katy Perry - Dark Horse', 'Video ketiga dalam daftar')">
                  <img src="https://img.youtube.com/vi/aIcCk-0DPlo/mqdefault.jpg" alt="Thumbnail 3" class="me-3 rounded-2 border" style="width: 80px; height: 60px; object-fit: cover;">
                  <div>
                    <h6 class="mb-1 fw-bold">Video 3</h6>
                    <small class="text-muted">Katy Perry - Dark Horse</small>
                  </div>
                </div>

                <div class="video-item mb-3 p-2 border-0 rounded-3 cursor-pointer d-flex align-items-center bg-white shadow-sm" onclick="changeVideo('L_jWHffIx5E', 'Video 4 - Smash Mouth - All Star', 'Video keempat dalam daftar')">
                  <img src="https://img.youtube.com/vi/L_jWHffIx5E/mqdefault.jpg" alt="Thumbnail 4" class="me-3 rounded-2 border" style="width: 80px; height: 60px; object-fit: cover;">
                  <div>
                    <h6 class="mb-1 fw-bold">Video 4</h6>
                    <small class="text-muted">Smash Mouth - All Star</small>
                  </div>
                </div>

                <div class="video-item mb-3 p-2 border-0 rounded-3 cursor-pointer d-flex align-items-center bg-white shadow-sm" onclick="changeVideo('tVj0ZTS4WF4', 'Video 5 - Queen - Bohemian Rhapsody', 'Video kelima dalam daftar')">
                  <img src="https://img.youtube.com/vi/tVj0ZTS4WF4/mqdefault.jpg" alt="Thumbnail 5" class="me-3 rounded-2 border" style="width: 80px; height: 60px; object-fit: cover;">
                  <div>
                    <h6 class="mb-1 fw-bold">Video 5</h6>
                    <small class="text-muted">Queen - Bohemian Rhapsody</small>
                  </div>
                </div>

                <div class="video-item mb-3 p-2 border-0 rounded-3 cursor-pointer d-flex align-items-center bg-white shadow-sm" onclick="changeVideo('fJ9rUzIMcZQ', 'Video 6 - Queen - Bohemian Rhapsody', 'Video keenam dalam daftar')">
                  <img src="https://img.youtube.com/vi/fJ9rUzIMcZQ/mqdefault.jpg" alt="Thumbnail 6" class="me-3 rounded-2 border" style="width: 80px; height: 60px; object-fit: cover;">
                  <div>
                    <h6 class="mb-1 fw-bold">Video 6</h6>
                    <small class="text-muted">Queen - Bohemian Rhapsody</small>
                  </div>
                </div>

                <div class="video-item mb-3 p-2 border-0 rounded-3 cursor-pointer d-flex align-items-center bg-white shadow-sm" onclick="changeVideo('eY52Zsg-KVI', 'Video 7 - Queen - Another One Bites The Dust', 'Video ketujuh dalam daftar')">
                  <img src="https://img.youtube.com/vi/eY52Zsg-KVI/mqdefault.jpg" alt="Thumbnail 7" class="me-3 rounded-2 border" style="width: 80px; height: 60px; object-fit: cover;">
                  <div>
                    <h6 class="mb-1 fw-bold">Video 7</h6>
                    <small class="text-muted">Queen - Another One Bites The Dust</small>
                  </div>
                </div>

                <div class="video-item mb-3 p-2 border-0 rounded-3 cursor-pointer d-flex align-items-center bg-white shadow-sm" onclick="changeVideo('2Vv-BfVoq4g', 'Video 8 - Queen - We Will Rock You', 'Video kedelapan dalam daftar')">
                  <img src="https://img.youtube.com/vi/2Vv-BfVoq4g/mqdefault.jpg" alt="Thumbnail 8" class="me-3 rounded-2 border" style="width: 80px; height: 60px; object-fit: cover;">
                  <div>
                    <h6 class="mb-1 fw-bold">Video 8</h6>
                    <small class="text-muted">Queen - We Will Rock You</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal How -->
<div class="modal fade" id="modalHow" tabindex="-1" aria-labelledby="modalHowLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="max-width: 90%; height: 95vh;">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-body" style="height: calc(100% - 120px); overflow-y: auto;">
        <div class="row ">
            <div class="col-md-12 mb-4">
                <div class="position-relative">
                    <div class="ratio ratio-16x9">
                        <video id="videoHow" controls>
                            <source src="{{ asset('assets/video/malam.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="position-absolute" style="top: 15px; left: 15px; z-index: 10; opacity: 0.8;">
                        <img src="{{ asset('assets/img/kaiadmin/DCT.png') }}" alt="Logo" style="max-width: 120px; height: auto;">
                    </div>
                    <div class="progress mt-3" style="height: 5px;">
                        <div class="progress-bar" id="progress-how-0" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// --- Konstanta dan Variabel Global ---
const UNLOCK_THRESHOLD = 100;

// DM Modal
let videoProgressDM = [0, 0, 0];
let currentVideoIndexDM = 0;
let lastWatchedVideoDM = 0;
const videoFilesDM = [
    'dc1.mp4',   // Video Opening
    'pantai.mp4',    // Apa itu Core Team
    'malam.mp4'      // Video Ketiga
];

// What Modal
let videoProgressWhat = [0];
let currentVideoIndexWhat = 0;
let lastWatchedVideoWhat = 0;
const videoFilesWhat = ['kadal.mp4'];

// How Modal
let videoProgressHow = [0];
let currentVideoIndexHow = 0;
let lastWatchedVideoHow = 0;
const videoFilesHow = ['malam.mp4'];

// --- Helper Functions ---
function setVideoSource(video, videoId, onLoaded, onError) {
    const source = video.querySelector('source');
    const newSrc = "{{ asset('assets/video/') }}/" + videoId;
    source.src = newSrc;
    video.load();
    video.addEventListener('loadeddata', function handler() {
        if (typeof onLoaded === 'function') onLoaded();
        video.removeEventListener('loadeddata', handler);
    });
    if (typeof onError === 'function') {
        video.addEventListener('error', function handler(e) {
            onError(e);
            video.removeEventListener('error', handler);
        });
    }
}

// --- DM Modal Functions ---
function changeVideoDM(videoId, index, resumeTime) {
    const video = document.getElementById('videoDM');
    setVideoSource(video, videoId, function() {
        if (resumeTime && !isNaN(resumeTime) && resumeTime > 0) {
            video.currentTime = resumeTime;
        }
        video.play().catch(() => {});
    }, function() {
        alert('Gagal memuat video: ' + videoId);
    });
    updateActiveVideoDM(index);
    currentVideoIndexDM = index;
    saveProgressDM();
}
function updateActiveVideoDM(index) {
    const listItems = document.querySelectorAll('#videoListDM li');
    listItems.forEach((item, i) => {
        item.classList.remove('active-video');
        if (i === index) item.classList.add('active-video');
    });
}
function notifyLocked(index) {
    alert('Anda harus menyelesaikan video sebelumnya sampai selesai (100%) untuk membuka video ini.');
}
function unlockNextVideoDM(index) {
    if (index >= 1 && index <= 2) {
        const videoNum = index + 1;
        const listItem = document.getElementById(`video${videoNum}-dm-list`);
        const link = document.getElementById(`video${videoNum}-dm-link`);
        if (listItem && link) {
            listItem.classList.remove('disabled-video');
            link.classList.remove('text-muted');
            link.onclick = function() { changeVideoDM(videoFilesDM[index], index); };
        }
    }
}
function saveProgressDM() {
    localStorage.setItem('videoProgressDM', JSON.stringify(videoProgressDM));
    localStorage.setItem('currentVideoIndexDM', currentVideoIndexDM);
    localStorage.setItem('lastWatchedVideoDM', lastWatchedVideoDM.toString());
    const videoPlayer = document.getElementById('videoDM');
    if (videoPlayer && videoPlayer.currentTime > 0) {
        localStorage.setItem('lastVideoTimeDM', videoPlayer.currentTime);
    }
}
function loadProgressDM() {
    try {
        const savedProgress = localStorage.getItem('videoProgressDM');
        const savedLastWatched = localStorage.getItem('lastWatchedVideoDM');
        const savedVideoTime = localStorage.getItem('lastVideoTimeDM');
        if (savedProgress) {
            videoProgressDM = JSON.parse(savedProgress);
            videoProgressDM.forEach((progress, index) => {
                const progressBar = document.getElementById(`progress-dm-${index}`);
                if (progressBar) {
                    progressBar.style.width = `${progress}%`;
                    progressBar.setAttribute('aria-valuenow', progress);
                }
                if (progress >= UNLOCK_THRESHOLD && index < videoFilesDM.length - 1) {
                    unlockNextVideoDM(index + 1);
                }
                if (progress >= 100) {
                    const listItem = document.querySelectorAll('#videoListDM li')[index];
                    if (listItem) listItem.classList.add('completed-video');
                }
            });
        }
        if (savedLastWatched) {
            lastWatchedVideoDM = parseInt(savedLastWatched);
            currentVideoIndexDM = lastWatchedVideoDM;
            updateActiveVideoDM(currentVideoIndexDM);
            changeVideoDM(videoFilesDM[currentVideoIndexDM], currentVideoIndexDM, savedVideoTime ? parseFloat(savedVideoTime) : 0);
            setTimeout(() => {
                alert(`Selamat datang kembali! Melanjutkan dari video ${currentVideoIndexDM + 1}`);
            }, 500);
        }
    } catch (error) {
        console.error('Error loading progress DM:', error);
        videoProgressDM = [0, 0, 0];
        lastWatchedVideoDM = 0;
    }
}
function trackVideoProgressDM() {
    const videoPlayer = document.getElementById('videoDM');
    videoPlayer.addEventListener('timeupdate', function() {
        if (videoPlayer.duration) {
            const percentage = Math.floor((videoPlayer.currentTime / videoPlayer.duration) * 100);
            videoProgressDM[currentVideoIndexDM] = Math.max(videoProgressDM[currentVideoIndexDM], percentage);
            const progressBar = document.getElementById(`progress-dm-${currentVideoIndexDM}`);
            if (progressBar) {
                progressBar.style.width = `${percentage}%`;
                progressBar.setAttribute('aria-valuenow', percentage);
            }
            localStorage.setItem('lastVideoTimeDM', videoPlayer.currentTime);
            lastWatchedVideoDM = currentVideoIndexDM;
            saveProgressDM();
        }
    });
    window.addEventListener('beforeunload', function() {
        if (videoPlayer.currentTime > 0) {
            localStorage.setItem('lastVideoTimeDM', videoPlayer.currentTime);
            localStorage.setItem('lastWatchedVideoDM', currentVideoIndexDM.toString());
        }
    });
    videoPlayer.addEventListener('ended', function() {
        videoProgressDM[currentVideoIndexDM] = 100;
        const progressBar = document.getElementById(`progress-dm-${currentVideoIndexDM}`);
        if (progressBar) {
            progressBar.style.width = '100%';
            progressBar.setAttribute('aria-valuenow', 100);
        }
        const listItem = document.querySelectorAll('#videoListDM li')[currentVideoIndexDM];
        if (listItem) listItem.classList.add('completed-video');
        if (currentVideoIndexDM < videoFilesDM.length - 1) {
            unlockNextVideoDM(currentVideoIndexDM);
            setTimeout(() => {
                changeVideoDM(videoFilesDM[currentVideoIndexDM + 1], currentVideoIndexDM + 1);
            }, 1500);
        }
        lastWatchedVideoDM = currentVideoIndexDM;
        saveProgressDM();
        alert('Video selesai! Anda bisa melanjutkan ke video berikutnya.');
    });
}

// --- What Modal Functions ---
function changeVideoWhatDM(videoId, index, resumeTime) {
    const video = document.getElementById('videoWhatDM');
    setVideoSource(video, videoId, function() {
        if (resumeTime && !isNaN(resumeTime) && resumeTime > 0) {
            video.currentTime = resumeTime;
        }
        video.play().catch(() => {});
    }, function() {
        alert('Gagal memuat video: ' + videoId);
    });
    currentVideoIndexWhat = index;
    saveProgressWhatDM();
}
function saveProgressWhatDM() {
    localStorage.setItem('videoProgressWhatDM', JSON.stringify(videoProgressWhat));
    localStorage.setItem('currentVideoIndexWhat', currentVideoIndexWhat);
    localStorage.setItem('lastWatchedVideoWhat', lastWatchedVideoWhat.toString());
    const videoPlayer = document.getElementById('videoWhatDM');
    if (videoPlayer && videoPlayer.currentTime > 0) {
        localStorage.setItem('lastVideoTimeWhat', videoPlayer.currentTime);
    }
}
function loadProgressWhatDM() {
    try {
        const savedProgress = localStorage.getItem('videoProgressWhatDM');
        const savedLastWatched = localStorage.getItem('lastWatchedVideoWhat');
        const savedVideoTime = localStorage.getItem('lastVideoTimeWhat');
        if (savedProgress) {
            videoProgressWhat = JSON.parse(savedProgress);
            const progressBar = document.getElementById('progress-what-dm-0');
            if (progressBar) {
                progressBar.style.width = `${videoProgressWhat[0]}%`;
                progressBar.setAttribute('aria-valuenow', videoProgressWhat[0]);
            }
        }
        if (savedLastWatched) {
            lastWatchedVideoWhat = parseInt(savedLastWatched);
            currentVideoIndexWhat = lastWatchedVideoWhat;
            changeVideoWhatDM(videoFilesWhat[currentVideoIndexWhat], currentVideoIndexWhat, savedVideoTime ? parseFloat(savedVideoTime) : 0);
        }
    } catch (error) {
        console.error('Error loading progress What DM:', error);
        videoProgressWhat = [0];
    }
}
function trackVideoProgressWhatDM() {
    const video = document.getElementById('videoWhatDM');
    video.addEventListener('timeupdate', function() {
        if (video.duration) {
            const percentage = Math.floor((video.currentTime / video.duration) * 100);
            videoProgressWhat[0] = Math.max(videoProgressWhat[0], percentage);
            const progressBar = document.getElementById('progress-what-dm-0');
            if (progressBar) {
                progressBar.style.width = `${percentage}%`;
                progressBar.setAttribute('aria-valuenow', percentage);
            }
            saveProgressWhatDM();
        }
    });
    video.addEventListener('ended', function() {
        videoProgressWhat[0] = 100;
        saveProgressWhatDM();
        alert('Video selesai!');
    });
}

// --- How Modal Functions ---
function changeVideoHow(videoId, index, resumeTime) {
    const video = document.getElementById('videoHow');
    setVideoSource(video, videoId, function() {
        if (resumeTime && !isNaN(resumeTime) && resumeTime > 0) {
            video.currentTime = resumeTime;
        }
        video.play().catch(() => {});
    }, function() {
        alert('Gagal memuat video: ' + videoId);
    });
    currentVideoIndexHow = index;
    saveProgressHow();
}
function saveProgressHow() {
    localStorage.setItem('videoProgressHow', JSON.stringify(videoProgressHow));
    localStorage.setItem('currentVideoIndexHow', currentVideoIndexHow);
    localStorage.setItem('lastWatchedVideoHow', lastWatchedVideoHow.toString());
    const videoPlayer = document.getElementById('videoHow');
    if (videoPlayer && videoPlayer.currentTime > 0) {
        localStorage.setItem('lastVideoTimeHow', videoPlayer.currentTime);
    }
}
function loadProgressHow() {
    try {
        const savedProgress = localStorage.getItem('videoProgressHow');
        const savedLastWatched = localStorage.getItem('lastWatchedVideoHow');
        const savedVideoTime = localStorage.getItem('lastVideoTimeHow');
        if (savedProgress) {
            videoProgressHow = JSON.parse(savedProgress);
            const progressBar = document.getElementById('progress-how-0');
            if (progressBar) {
                progressBar.style.width = `${videoProgressHow[0]}%`;
                progressBar.setAttribute('aria-valuenow', videoProgressHow[0]);
            }
        }
        if (savedLastWatched) {
            lastWatchedVideoHow = parseInt(savedLastWatched);
            currentVideoIndexHow = lastWatchedVideoHow;
            changeVideoHow(videoFilesHow[currentVideoIndexHow], currentVideoIndexHow, savedVideoTime ? parseFloat(savedVideoTime) : 0);
        }
    } catch (error) {
        console.error('Error loading progress How:', error);
        videoProgressHow = [0];
    }
}
function trackVideoProgressHow() {
    const video = document.getElementById('videoHow');
    video.addEventListener('timeupdate', function() {
        if (video.duration) {
            const percentage = Math.floor((video.currentTime / video.duration) * 100);
            videoProgressHow[0] = Math.max(videoProgressHow[0], percentage);
            const progressBar = document.getElementById('progress-how-0');
            if (progressBar) {
                progressBar.style.width = `${percentage}%`;
                progressBar.setAttribute('aria-valuenow', percentage);
            }
            saveProgressHow();
        }
    });
    video.addEventListener('ended', function() {
        videoProgressHow[0] = 100;
        saveProgressHow();
        alert('Video selesai!');
    });
}

// --- Inisialisasi ---
document.addEventListener('DOMContentLoaded', function() {
    // DM
    trackVideoProgressDM();
    loadProgressDM();
    // What DM
    trackVideoProgressWhatDM();
    loadProgressWhatDM();
    // How
    trackVideoProgressHow();
    loadProgressHow();
});
</script>

<style>
.disabled-video-btn {
    opacity: 0.6;
    cursor: not-allowed;
}
.completed-video {
    background-color: #e8f5e9;
}
.active-video {
    background-color: #e3f2fd;
}
.cursor-pointer {
  cursor: pointer;
}
.video-item:hover {
  background-color: #f8f9fa;
  border-color: #007bff !important;
}
.video-item.active {
  background-color: #e3f2fd;
  border-color: #2196f3 !important;
}
</style>

<script>
function changeVideo(videoId, title, description) {
  // Update main video player
  document.getElementById('mainVideoPlayer').src = `https://www.youtube.com/embed/${videoId}`;

  // Update title and description
  document.getElementById('videoTitle').textContent = title;
  document.getElementById('videoDescription').textContent = description;

  // Update active state in video list
  document.querySelectorAll('.video-item').forEach(item => {
    item.classList.remove('active');
  });
  event.currentTarget.classList.add('active');
}
</script> --}}
