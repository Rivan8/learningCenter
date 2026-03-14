// video-why.js
// Script khusus logic dan fungsi untuk modal Why
// (Pindahkan semua fungsi JS terkait modal Why ke sini)

// Contoh: changeVideoWhy, updateActiveVideo, unlockNextVideo, saveProgress, loadProgress, trackVideoProgress, dsb

// ... (isi sesuai script logic modal Why yang sudah ada)

// --- Konstanta dan Variabel Modal Why ---
const UNLOCK_THRESHOLD_WHY = 100;
let videoProgressWhy = [0, 0, 0, 0, 0];
let currentVideoIndexWhy = 0;
let lastWatchedVideoWhy = 0;
const videoFilesWhy = [
    "dc1.mp4", // Video Opening
    "video2.mp4", // Video Pendahuluan
    "video3.mp4", // Video Ketiga
    "video4.mp4", // Video Keempat
    "video5.mp4", // Video Kelima
];

function changeVideoWhy(videoId, index, resumeTime = 0) {
    var video = document.getElementById('videoWhy');
    var source = video.querySelector('source');
    source.src = "/assets/video/" + videoId;
    video.load();
    updateActiveVideoWhy(index);
    currentVideoIndexWhy = index;
    saveProgressWhy();
    // Resume at last position if provided
    if (resumeTime > 0) {
        video.addEventListener('loadedmetadata', function onLoaded() {
            if (resumeTime < video.duration) {
                video.currentTime = resumeTime;
            }
            video.removeEventListener('loadedmetadata', onLoaded);
        });
    }
}

function updateActiveVideoWhy(index) {
    const listItems = document.querySelectorAll('#videoListWhy li');
    listItems.forEach((item, i) => {
        item.classList.remove('active-video');
        if (i === index) {
            item.classList.add('active-video');
        }
    });
}

function unlockNextVideoWhy(index) {
    if (index >= 1 && index <= 4) {
        const videoNum = index + 1;
        const listItem = document.getElementById(`video${videoNum}-why-list`);
        const link = document.getElementById(`video${videoNum}-why-link`);
        if (listItem && link) {
            listItem.classList.remove('disabled-video');
            link.classList.remove('text-muted');
            link.onclick = function() { changeVideoWhy(videoFilesWhy[index], index); };
        }
    }
}

function saveProgressWhy() {
    try {
        const videoPlayer = document.getElementById('videoWhy');
        const progressState = {
            videoProgressWhy,
            currentVideoIndexWhy,
            lastWatchedVideoWhy: currentVideoIndexWhy,
            lastPositionWhy: videoPlayer ? videoPlayer.currentTime : 0,
            lastPlayedVideoWhy: videoFilesWhy[currentVideoIndexWhy],
            timestamp: new Date().getTime()
        };
        localStorage.setItem('videoProgressStateWhy', JSON.stringify(progressState));
    } catch (error) {
        console.error('Error saving progress Why:', error);
    }
}

function loadProgressWhy() {
    try {
        const savedState = localStorage.getItem('videoProgressStateWhy');
        if (savedState) {
            const progressState = JSON.parse(savedState);
            videoProgressWhy = progressState.videoProgressWhy || [0,0,0,0,0];
            currentVideoIndexWhy = progressState.currentVideoIndexWhy ?? progressState.lastWatchedVideoWhy ?? 0;
            lastWatchedVideoWhy = currentVideoIndexWhy;
            const lastPositionWhy = progressState.lastPositionWhy || 0;
            // Update UI for all videos
            videoProgressWhy.forEach((progress, index) => {
                const progressBar = document.getElementById(`progress-why-${index}`);
                if (progressBar) {
                    progressBar.style.width = `${progress}%`;
                    progressBar.setAttribute('aria-valuenow', progress);
                }
                // Unlock next video if previous is completed
                if (index === 0 || videoProgressWhy[index - 1] >= UNLOCK_THRESHOLD_WHY) {
                    const listItem = document.getElementById(`video${index + 1}-why-list`);
                    const link = document.getElementById(`video${index + 1}-why-link`);
                    if (listItem && link) {
                        listItem.classList.remove('disabled-video');
                        link.classList.remove('text-muted');
                        link.onclick = function() { changeVideoWhy(videoFilesWhy[index], index); };
                    }
                }
                if (progress >= 100) {
                    const listItem = document.querySelectorAll('#videoListWhy li')[index];
                    if (listItem) {
                        listItem.classList.add('completed-video');
                    }
                }
            });
            // Resume last watched video and position
            changeVideoWhy(videoFilesWhy[currentVideoIndexWhy], currentVideoIndexWhy, lastPositionWhy);
            updateActiveVideoWhy(currentVideoIndexWhy);
            if (lastPositionWhy > 0) {
                const minutes = Math.floor(lastPositionWhy / 60);
                const seconds = Math.floor(lastPositionWhy % 60);
                const timeString = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                setTimeout(() => {
                    alert(`Selamat datang kembali! Melanjutkan Video ${currentVideoIndexWhy + 1} dari posisi ${timeString}`);
                }, 500);
            }
        }
    } catch (error) {
        console.error('Error loading progress Why:', error);
        videoProgressWhy = [0,0,0,0,0];
        currentVideoIndexWhy = 0;
        lastWatchedVideoWhy = 0;
    }
}

function trackVideoProgressWhy() {
    const videoPlayer = document.getElementById('videoWhy');
    if (!videoPlayer) return;
    videoPlayer.addEventListener('timeupdate', function() {
        if (videoPlayer.duration) {
            const percentage = Math.floor((videoPlayer.currentTime / videoPlayer.duration) * 100);
            videoProgressWhy[currentVideoIndexWhy] = Math.max(videoProgressWhy[currentVideoIndexWhy], percentage);
            const progressBar = document.getElementById(`progress-why-${currentVideoIndexWhy}`);
            if (progressBar) {
                progressBar.style.width = `${percentage}%`;
                progressBar.setAttribute('aria-valuenow', percentage);
            }
            lastWatchedVideoWhy = currentVideoIndexWhy;
            saveProgressWhy();
        }
    });
    videoPlayer.addEventListener('ended', function() {
        videoProgressWhy[currentVideoIndexWhy] = 100;
        const progressBar = document.getElementById(`progress-why-${currentVideoIndexWhy}`);
        if (progressBar) {
            progressBar.style.width = '100%';
            progressBar.setAttribute('aria-valuenow', 100);
        }
        const listItem = document.querySelectorAll('#videoListWhy li')[currentVideoIndexWhy];
        if (listItem) {
            listItem.classList.add('completed-video');
        }
        if (currentVideoIndexWhy < videoFilesWhy.length - 1) {
            unlockNextVideoWhy(currentVideoIndexWhy);
            setTimeout(() => {
                changeVideoWhy(videoFilesWhy[currentVideoIndexWhy + 1], currentVideoIndexWhy + 1);
            }, 1200);
        }
        lastWatchedVideoWhy = currentVideoIndexWhy;
        saveProgressWhy();
        alert('Video selesai! Anda bisa melanjutkan ke video berikutnya.');
    });
}

function notifyLockedWhy(index) {
    alert('Anda harus menyelesaikan video sebelumnya sampai selesai (100%) untuk membuka video ini.');
}

document.addEventListener('DOMContentLoaded', function() {
    loadProgressWhy();
    trackVideoProgressWhy();
});
