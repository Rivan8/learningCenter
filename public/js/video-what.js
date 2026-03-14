
// --- Konstanta dan Variabel Modal What ---
const UNLOCK_THRESHOLD = 100;
let videoProgressWhat = [0, 0, 0, 0, 0];
let currentVideoIndexWhat = 0;
let lastWatchedVideoWhat = 0;
const videoFilesWhat = [
    'video1.mp4',   // Video Opening
    'video2.mp4',   // Video Pendahuluan
    'video3.mp4',   // Video Ketiga
    'video4.mp4',   // Video Keempat
    'video5.mp4'    // Video Kelima
];

function changeVideoWhat(videoId, index, resumeTime = 0) {
    var video = document.getElementById('videoWhat');
    var source = video.querySelector('source');
     source.src = "/assets/video/" + videoId;
    video.load();
    updateActiveVideoWhat(index);
    currentVideoIndexWhat = index;
    saveProgressWhat();
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

function updateActiveVideoWhat(index) {
    const listItems = document.querySelectorAll('#videoListWhat li');
    listItems.forEach((item, i) => {
        item.classList.remove('active-video');
        if (i === index) {
            item.classList.add('active-video');
        }
    });
}

function unlockNextVideoWhat(index) {
    if (index >= 1 && index <= 4) {
        const videoNum = index + 1;
        const listItem = document.getElementById(`video${videoNum}-what-list`);
        const link = document.getElementById(`video${videoNum}-what-link`);
        if (listItem && link) {
            listItem.classList.remove('disabled-video');
            link.classList.remove('text-muted');
            link.onclick = function() { changeVideoWhat(videoFilesWhat[index], index); };
        }
    }
}

function saveProgressWhat() {
    try {
        const videoPlayer = document.getElementById('videoWhat');
        const progressState = {
            videoProgressWhat,
            currentVideoIndexWhat,
            lastWatchedVideoWhat: currentVideoIndexWhat,
            lastPositionWhat: videoPlayer ? videoPlayer.currentTime : 0,
            lastPlayedVideoWhat: videoFilesWhat[currentVideoIndexWhat],
            timestamp: new Date().getTime()
        };
        localStorage.setItem('videoProgressStateWhat', JSON.stringify(progressState));
    } catch (error) {
        console.error('Error saving progress What:', error);
    }
}

function loadProgressWhat() {
    try {
        const savedState = localStorage.getItem('videoProgressStateWhat');
        if (savedState) {
            const progressState = JSON.parse(savedState);
            videoProgressWhat = progressState.videoProgressWhat || [0,0,0,0,0];
            currentVideoIndexWhat = progressState.currentVideoIndexWhat ?? progressState.lastWatchedVideoWhat ?? 0;
            lastWatchedVideoWhat = currentVideoIndexWhat;
            const lastPositionWhat = progressState.lastPositionWhat || 0;
            // Update UI for all videos
            videoProgressWhat.forEach((progress, index) => {
                const progressBar = document.getElementById(`progress-what-${index}`);
                if (progressBar) {
                    progressBar.style.width = `${progress}%`;
                    progressBar.setAttribute('aria-valuenow', progress);
                }
                // Unlock next video if previous is completed
                if (index === 0 || videoProgressWhat[index - 1] >= UNLOCK_THRESHOLD) {
                    const listItem = document.getElementById(`video${index + 1}-what-list`);
                    const link = document.getElementById(`video${index + 1}-what-link`);
                    if (listItem && link) {
                        listItem.classList.remove('disabled-video');
                        link.classList.remove('text-muted');
                        link.onclick = function() { changeVideoWhat(videoFilesWhat[index], index); };
                    }
                }
                if (progress >= 100) {
                    const listItem = document.querySelectorAll('#videoListWhat li')[index];
                    if (listItem) {
                        listItem.classList.add('completed-video');
                    }
                }
            });
            // Resume last watched video and position
            changeVideoWhat(videoFilesWhat[currentVideoIndexWhat], currentVideoIndexWhat, lastPositionWhat);
            updateActiveVideoWhat(currentVideoIndexWhat);
            if (lastPositionWhat > 0) {
                const minutes = Math.floor(lastPositionWhat / 60);
                const seconds = Math.floor(lastPositionWhat % 60);
                const timeString = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                setTimeout(() => {
                    alert(`Selamat datang kembali! Melanjutkan Video ${currentVideoIndexWhat + 1} dari posisi ${timeString}`);
                }, 500);
            }
        }
    } catch (error) {
        console.error('Error loading progress What:', error);
        videoProgressWhat = [0,0,0,0,0];
        currentVideoIndexWhat = 0;
        lastWatchedVideoWhat = 0;
    }
}

function trackVideoProgressWhat() {
    const videoPlayer = document.getElementById('videoWhat');
    if (!videoPlayer) return;
    videoPlayer.addEventListener('timeupdate', function() {
        if (videoPlayer.duration) {
            const percentage = Math.floor((videoPlayer.currentTime / videoPlayer.duration) * 100);
            videoProgressWhat[currentVideoIndexWhat] = Math.max(videoProgressWhat[currentVideoIndexWhat], percentage);
            const progressBar = document.getElementById(`progress-what-${currentVideoIndexWhat}`);
            if (progressBar) {
                progressBar.style.width = `${percentage}%`;
                progressBar.setAttribute('aria-valuenow', percentage);
            }
            lastWatchedVideoWhat = currentVideoIndexWhat;
            saveProgressWhat();
        }
    });
    videoPlayer.addEventListener('ended', function() {
        videoProgressWhat[currentVideoIndexWhat] = 100;
        const progressBar = document.getElementById(`progress-what-${currentVideoIndexWhat}`);
        if (progressBar) {
            progressBar.style.width = '100%';
            progressBar.setAttribute('aria-valuenow', 100);
        }
        const listItem = document.querySelectorAll('#videoListWhat li')[currentVideoIndexWhat];
        if (listItem) {
            listItem.classList.add('completed-video');
        }
        if (currentVideoIndexWhat < videoFilesWhat.length - 1) {
            unlockNextVideoWhat(currentVideoIndexWhat);
            setTimeout(() => {
                changeVideoWhat(videoFilesWhat[currentVideoIndexWhat + 1], currentVideoIndexWhat + 1);
            }, 1200);
        }
        lastWatchedVideoWhat = currentVideoIndexWhat;
        saveProgressWhat();
        alert('Video selesai! Anda bisa melanjutkan ke video berikutnya.');
    });
}

function notifyLocked(index) {
    alert('Anda harus menyelesaikan video sebelumnya sampai selesai (100%) untuk membuka video ini.');
}

document.addEventListener('DOMContentLoaded', function() {
    loadProgressWhat();
    trackVideoProgressWhat();
});
