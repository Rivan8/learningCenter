
@php
  $videoFilesWhy = [
    '01. CTT - Video 01 - Introduction-Church Vision_Lampos Aritonang-.mp4',
    '02. CTT - Video 2 - The Why  - Mengapa Memuridkan_Lampos Aritonang.mp4',
    '03. CTT - Video 3 - The What- Disciples Community_Imelda.mp4',
    '04. CTT - Video 4 - The How I.mp4',
    '05. CTT - Video 5 - Membangun Hubungan.mp4',
    '06. CTT - Video 6 - Menyimak Secara Aktif.mp4',
    '07. CTT - Video 07 - Bertanya dengan Baik.mp4',
    '08. CTT - Video 8 - DM - Gembala_David Ryan Wilando_Subtitles.mp4',
    '09. CTT - Video 09 - Greetings.mp4',
  ];
  $videoTitlesWhy = [
    'Introduction-Church Vision',
    'The Why - Mengapa Memuridkan',
    'The What - Disciples Community',
    'The How I',
    'Membangun Hubungan',
    'Menyimak Secara Aktif',
    'Bertanya dengan Baik',
    'DM - Gembala',
    'Greetings'
  ];
  $videoDescriptionsWhy = [
    'Video pembuka yang menjelaskan visi gereja dan dasar-dasar pemuridan dalam komunitas Kristen. Disampaikan oleh Lampos Aritonang.',
    'Pembahasan mendalam tentang alasan mengapa pemuridan sangat penting dalam kehidupan Kristen dan dampaknya bagi pertumbuhan iman.',
    'Penjelasan tentang apa itu Disciples Community dan bagaimana komunitas ini berperan dalam membentuk karakter Kristus.',
    'Panduan praktis tentang cara-cara efektif dalam melakukan pemuridan dan membangun hubungan dengan sesama.',
    'Teknik-teknik membangun hubungan yang sehat dan bermakna dalam konteks pemuridan dan pelayanan.',
    'Keterampilan mendengarkan secara aktif untuk memahami dan merespons kebutuhan orang lain dengan lebih baik.',
    'Cara bertanya yang efektif untuk menggali pemahaman dan mendorong pertumbuhan spiritual.',
    'Pembahasan tentang peran gembala dalam pemuridan dan kepemimpinan spiritual. Disampaikan oleh David Ryan Wilando.',
    'Sambutan dan pengantar untuk sesi pembelajaran pemuridan.'
  ];
  $videoSpeakersWhy = [
    'Ps. Lampos Aritonang',
    'Ps. Lampos Aritonang',
    'Imelda Blegur',
    'Ps. Alfiano Armando Tagor, M.Pd.K',
    'Ps. Alfiano Armando Tagor, M.Pd.K',
    'Ps. Alfiano Armando Tagor, M.Pd.K',
    'Imelda Blegur',
    'David Ryan Wilando, SM',
    'Senior Pastor - Ps. Yehezkiel Wilan, M.Th'
  ];
  $videoThumbnailsWhy = [
    asset('assets/img/examples/lampos.png'),
    asset('assets/img/examples/lampos.png'),
    asset('assets/img/examples/imel.png'),
    asset('assets/img/examples/tagorKotak.png'),
    asset('assets/img/examples/tagorPutih.png'),
    asset('assets/img/examples/tagorRompi.png'),
    asset('assets/img/examples/imelJuga.png'),
    asset('assets/img/examples/david.png'),
    asset('assets/img/examples/gembala.png'),
  ];
@endphp

<style>
:root {
  --primary: #2563eb;
  --primary-dark: #1e40af;
  --bg: #f7f8fa;
  --card: #fff;
  --text: #22223b;
  --text-soft: #6c757d;
  --accent: #fbbf24;
  --border: #e5e7eb;
  --radius: 18px;
  --shadow: 0 4px 24px 0 rgba(30, 64, 175, 0.08);
}
#modalWhy .modal-dialog {
  width: 85vw;
  max-width: 1200px;
  margin: 2.5rem auto;
}
#modalWhy .modal-content {
  background: var(--bg);
  border-radius: var(--radius);
  border: none;
  box-shadow: var(--shadow);
  padding: 0;
}
#modalWhy .modal-header {
  background: linear-gradient(90deg, var(--primary), var(--primary-dark));
  color: #fff;
  border-radius: var(--radius) var(--radius) 0 0;
  border: none;
  padding: 1.5rem 2rem 1rem 2rem;
  align-items: center;
}
#modalWhy .modal-title {
  font-size: 1.5rem;
  font-weight: 700;
  letter-spacing: 0.01em;
}
#modalWhy .btn-close {
  filter: invert(1);
  opacity: 0.7;
}
#modalWhy .modal-body {
  padding: 0;
  background: var(--bg);
}
#modalWhy .video-main-area {
  background: var(--card);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  margin: 2rem 0 2rem 2rem;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}
#modalWhy .video-player-wrap {
  border-radius: 1rem;
  overflow: hidden;
  box-shadow: 0 2px 12px 0 rgba(30, 64, 175, 0.10);
  background: #000;
  position: relative;
  padding: 0;
}
#modalWhy .ratio {
  width: 100%;
  height: auto;
  background: #000;
  border-radius: 1rem;
  margin: 0;
}
#modalWhy .ratio video {
  width: 100% !important;
  height: 100% !important;
  object-fit: cover;
  background: #000;
  border-radius: 1rem;
  margin: 0;
  display: block;
}
#modalWhy .video-info-modern {
  margin-top: 1.5rem;
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  gap: 2rem;
}
#modalWhy .video-meta-modern {
  flex: 1 1 0%;
}
#modalWhy .video-title-modern {
  font-size: 1.3rem;
  font-weight: 600;
  margin-bottom: 0.5rem;
  color: var(--primary-dark);
}
#modalWhy .video-desc-modern {
  color: var(--text-soft);
  font-size: 1rem;
  margin-bottom: 1rem;
}
#modalWhy .video-speaker-modern {
  font-size: 0.95rem;
  color: var(--primary);
  font-weight: 500;
  margin-bottom: 0.5rem;
}
#modalWhy .video-progress-modern {
  margin-top: 1rem;
  width: 100%;
  height: 8px;
  background: #e5e7eb;
  border-radius: 6px;
  overflow: hidden;
}
#modalWhy .video-progress-bar-modern {
  height: 100%;
  background: linear-gradient(90deg, var(--primary), var(--accent));
  border-radius: 6px;
  transition: width 0.4s cubic-bezier(.4,2,.3,1);
}
#modalWhy .video-list-modern {
  background: var(--card);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  margin: 2rem 2rem 2rem 0;
  padding: 2rem 1.5rem;
  min-width: 340px;
  max-width: 370px;
  display: flex;
  flex-direction: column;
  gap: 1.2rem;
  height: fit-content;
}
#modalWhy .video-list-modern-title {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 1rem;
  color: var(--primary-dark);
}
#modalWhy .video-list-modern-item {
  display: flex;
  align-items: center;
  gap: 1rem;
  background: #f3f4f6;
  border-radius: 12px;
  padding: 0.7rem 1rem;
  cursor: pointer;
  transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
  border: 2px solid transparent;
  position: relative;
}
#modalWhy .video-list-modern-item.active {
  background: var(--primary);
  color: #fff;
  border-color: var(--primary-dark);
  box-shadow: 0 2px 8px 0 rgba(37,99,235,0.10);
  transform: scale(1.03);
}
#modalWhy .video-list-modern-item.completed {
  background: #e0fbe0;
  border-color: #22c55e;
  color: #22c55e;
}
#modalWhy .video-list-modern-item.locked {
  background: #f3f4f6;
  color: #bdbdbd;
  cursor: not-allowed;
  opacity: 0.7;
}
#modalWhy .video-list-modern-thumb {
  width: 56px;
  height: 40px;
  border-radius: 8px;
  object-fit: cover;
  background: #e5e7eb;
  box-shadow: 0 1px 4px 0 rgba(0,0,0,0.04);
}
#modalWhy .video-list-modern-info {
  flex: 1 1 0%;
  display: flex;
  flex-direction: column;
  gap: 0.2rem;
}
#modalWhy .video-list-modern-title2 {
  font-size: 1rem;
  font-weight: 500;
  margin-bottom: 0.1rem;
  color: inherit;
}
#modalWhy .video-list-modern-status {
  font-size: 0.85rem;
  color: var(--text-soft);
  display: flex;
  align-items: center;
  gap: 0.3rem;
}
#modalWhy .video-list-modern-progress {
  width: 100%;
  height: 5px;
  background: #e5e7eb;
  border-radius: 4px;
  margin-top: 0.3rem;
  overflow: hidden;
}
#modalWhy .video-list-modern-progress-bar {
  height: 100%;
  background: linear-gradient(90deg, var(--primary), var(--accent));
  border-radius: 4px;
  transition: width 0.4s cubic-bezier(.4,2,.3,1);
}
#modalWhy .video-list-modern-item .icon-lock {
  color: #bdbdbd;
  font-size: 1.1rem;
}
#modalWhy .video-list-modern-item.completed .icon-check {
  color: #22c55e;
  font-size: 1.1rem;
}
#modalWhy .video-list-modern-item.active .icon-play {
  color: #fff;
  font-size: 1.1rem;
}
@media (max-width: 991px) {
  #modalWhy .modal-dialog {
    max-width: 100vw !important;
    width: 98vw !important;
    margin: 0;
  }
  #modalWhy .video-main-area, #modalWhy .video-list-modern {
    margin: 1rem 0 !important;
    padding: 1rem !important;
  }
  #modalWhy .video-info-modern {
    flex-direction: column;
    gap: 1rem;
  }
  #modalWhy .video-list-modern {
    min-width: 0;
    max-width: 100vw;
    width: 100%;
  }
}
</style>

<div class="modal fade" id="modalWhy" tabindex="-1" aria-labelledby="modalWhyLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="width:85vw;max-width:1200px;margin:auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalWhyLabel">CTT - Core Team Training!!!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-start" style="background: var(--bg);">
        <div class="video-main-area flex-grow-1">
          <div class="video-player-wrap p-0 m-0" style="background:transparent;box-shadow:none;">
            <div class="ratio ratio-16x9" style="background:#000;">
              <video id="videoWhy" controls preload="metadata" crossorigin="anonymous" style="border-radius:1rem;">
                  <source id="videoWhySource" src="{{ asset('assets/video/' . $videoFilesWhy[0]) }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              </div>
          <div class="video-info-modern">
            <div class="video-meta-modern">
              <div class="video-title-modern" id="videoTitleWhy">{{ $videoTitlesWhy[0] }}</div>
              <div class="video-speaker-modern" id="videoSpeakerWhy"><i class="fas fa-user"></i> {{ $videoSpeakersWhy[0] }}</div>
              <div class="video-desc-modern" id="videoDescriptionWhy">{{ $videoDescriptionsWhy[0] }}</div>
              <div class="d-flex align-items-center gap-3 mt-2">
                <span class="badge bg-primary-soft text-primary"><i class="fas fa-clock"></i> <span id="videoDurationWhy">--:--</span></span>
                <span class="badge bg-secondary-soft text-secondary"><i class="fas fa-eye"></i> <span class="video-views">Video 1 dari {{ count($videoFilesWhy) }}</span></span>
              </div>
              <div class="video-progress-modern mt-3">
                <div class="video-progress-bar-modern" id="main-progress-why" style="width: 0%"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="video-list-modern ms-lg-4 mt-4 mt-lg-0">
          <div class="video-list-modern-title mb-2">Daftar Materi Video</div>
          <div id="videoListWhy">
              @foreach($videoFilesWhy as $i => $file)
              <div class="video-list-modern-item{{ $i === 0 ? ' active' : '' }}" id="video{{ $i+1 }}-why-list" onclick="changeVideoWhy('{{ $file }}', {{ $i }})">
                <img class="video-list-modern-thumb" src="{{ $videoThumbnailsWhy[$i] }}" alt="Thumbnail">
                <div class="video-list-modern-info">
                  <div class="video-list-modern-title2">{{ $videoTitlesWhy[$i] }}</div>
                  <div class="video-list-modern-status">
                    <span class="icon-play" style="display: {{ $i === 0 ? 'inline' : 'none' }};"><i class="fas fa-play-circle"></i></span>
                    <span class="icon-check" style="display: none;"><i class="fas fa-check-circle"></i></span>
                  </div>
                  <div class="video-list-modern-progress">
                    <div class="video-list-modern-progress-bar" id="progress-why-{{ $i }}" style="width: 0%"></div>
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
<script>
window.videoFilesWhy = @json($videoFilesWhy);
window.videoTitlesWhy = @json($videoTitlesWhy);
window.videoDescriptionsWhy = @json($videoDescriptionsWhy);
window.videoSpeakersWhy = @json($videoSpeakersWhy);
window.videoThumbnailsWhy = @json($videoThumbnailsWhy);
</script>
<script src="{{ asset('js/video-progress-why.js') }}"></script>
