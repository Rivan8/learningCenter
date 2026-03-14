
// --- Konstanta dan Variabel Modal How ---
const UNLOCK_THRESHOLD = 100;
let videoProgressHow = [0, 0, 0, 0, 0];
let currentVideoIndexHow = 0;
let lastWatchedVideoHow = 0;
const videoFilesHow = [
    'video1.mp4',   // Video Senin
    'video2.mp4',   // Video Selasa
    'video3.mp4',   // Video Rabu
    'video4.mp4',     // Video Kamis
    'video5.mp4'   // Video Jumat
];

function changeVideoHow(videoId, index, resumeTime = 0) {
    const video = document.getElementById('videoHow');
    const source = video.querySelector('source');
    source.src = "/assets/video/" + videoId;
    source.src = newSrc;
    video.load();
    updateActiveVideoHow(index);
    currentVideoIndexHow = index;
    saveProgressHow();
    // Resume at last position if provided
    if (resumeTime > 0) {
        video.addEventListener('loadedmetadata', function onLoaded() {
            if (resumeTime < video.duration) {
                video.currentTime = resumeTime;
            }
            video.removeEventListener('loadedmetadata', onLoaded);
        });
    }
    // Wait for video to be loaded before trying to play
    video.addEventListener('loadeddata', function onLoadedData() {
        if (video.duration && !isNaN(video.duration)) {
            video.play().catch(() => {});
        }
        video.removeEventListener('loadeddata', onLoadedData);
    });
    // Add error handler
    video.addEventListener('error', function onError() {
        console.error('Error loading video:', videoId);
        console.error('Video error:', video.error);
    });
}

function updateActiveVideoHow(index) {
    const listItems = document.querySelectorAll('#videoListHow li');
    listItems.forEach((item, i) => {
        item.classList.remove('active-video');
        if (i === index) {
            item.classList.add('active-video');
        }
    });
}

function unlockNextVideoHow(index) {
    if (index >= 1 && index <= 4) {
        const videoNum = index + 1;
        const listItem = document.getElementById(`video${videoNum}-how-list`);
        const link = document.getElementById(`video${videoNum}-how-link`);
        if (listItem && link) {
            listItem.classList.remove('disabled-video');
            link.classList.remove('text-muted');
            link.onclick = function() { changeVideoHow(videoFilesHow[index], index); };
        }
    }
}

function saveProgressHow() {
    try {
        const videoPlayer = document.getElementById('videoHow');
        const progressState = {
            videoProgressHow,
            currentVideoIndexHow,
            lastWatchedVideoHow: currentVideoIndexHow,
            lastPositionHow: videoPlayer ? videoPlayer.currentTime : 0,
            lastPlayedVideoHow: videoFilesHow[currentVideoIndexHow],
            timestamp: new Date().getTime()
        };
        localStorage.setItem('videoProgressStateHow', JSON.stringify(progressState));
    } catch (error) {
        console.error('Error saving progress How:', error);
    }
}

function loadProgressHow() {
    try {
        const savedState = localStorage.getItem('videoProgressStateHow');
        if (savedState) {
            const progressState = JSON.parse(savedState);
            videoProgressHow = progressState.videoProgressHow || [0,0,0,0,0];
            currentVideoIndexHow = progressState.currentVideoIndexHow ?? progressState.lastWatchedVideoHow ?? 0;
            lastWatchedVideoHow = currentVideoIndexHow;
            const lastPositionHow = progressState.lastPositionHow || 0;
            // Update UI for video How
            videoProgressHow.forEach((progress, index) => {
                const progressBar = document.getElementById(`progress-how-${index}`);
                if (progressBar) {
                    progressBar.style.width = `${progress}%`;
                    progressBar.setAttribute('aria-valuenow', progress);
                }
                if (progress >= 100) {
                    const video = document.getElementById('videoHow');
                    if (video) {
                        video.classList.add('completed-video');
                    }
                }
            });
            // Resume last watched video and position
            changeVideoHow(videoFilesHow[currentVideoIndexHow], currentVideoIndexHow);
            if (lastPositionHow > 0) {
                const video = document.getElementById('videoHow');
                video.addEventListener('loadedmetadata', function onLoaded() {
                    if (lastPositionHow < video.duration) {
                        video.currentTime = lastPositionHow;
                    }
                    video.removeEventListener('loadedmetadata', onLoaded);
                });
                const minutes = Math.floor(lastPositionHow / 60);
                const seconds = Math.floor(lastPositionHow % 60);
                const timeString = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                setTimeout(() => {
                    alert(`Selamat datang kembali! Melanjutkan Video How dari posisi ${timeString}`);
                }, 500);
            }
        }
    } catch (error) {
        console.error('Error loading progress How:', error);
        videoProgressHow = [0,0,0,0,0];
        currentVideoIndexHow = 0;
        lastWatchedVideoHow = 0;
    }
}

function trackVideoProgressHow() {
    const videoPlayer = document.getElementById('videoHow');
    if (!videoPlayer) return;
    videoPlayer.addEventListener('timeupdate', function() {
        if (videoPlayer.duration) {
            const percentage = Math.floor((videoPlayer.currentTime / videoPlayer.duration) * 100);
            videoProgressHow[currentVideoIndexHow] = Math.max(videoProgressHow[currentVideoIndexHow], percentage);
            const progressBar = document.getElementById(`progress-how-${currentVideoIndexHow}`);
            if (progressBar) {
                progressBar.style.width = `${percentage}%`;
                progressBar.setAttribute('aria-valuenow', percentage);
            }
            lastWatchedVideoHow = currentVideoIndexHow;
            saveProgressHow();
        }
    });
    videoPlayer.addEventListener('ended', function() {
        videoProgressHow[currentVideoIndexHow] = 100;
        const progressBar = document.getElementById(`progress-how-${currentVideoIndexHow}`);
        if (progressBar) {
            progressBar.style.width = '100%';
            progressBar.setAttribute('aria-valuenow', 100);
        }
        const listItem = document.querySelectorAll('#videoListHow li')[currentVideoIndexHow];
        if (listItem) {
            listItem.classList.add('completed-video');
        }
        if (currentVideoIndexHow < videoFilesHow.length - 1) {
            unlockNextVideoHow(currentVideoIndexHow);
            setTimeout(() => {
                changeVideoHow(videoFilesHow[currentVideoIndexHow + 1], currentVideoIndexHow + 1);
            }, 1200);
        }
        lastWatchedVideoHow = currentVideoIndexHow;
        saveProgressHow();
        alert('Video selesai! Anda bisa melanjutkan ke video berikutnya.');
    });
}

function notifyLocked(index) {
    alert('Anda harus menyelesaikan video sebelumnya sampai selesai (100%) untuk membuka video ini.');
}

document.addEventListener('DOMContentLoaded', function() {
    loadProgressHow();
    trackVideoProgressHow();
});
