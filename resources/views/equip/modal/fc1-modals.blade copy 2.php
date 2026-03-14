<div class="modal fade" id="modalEquipFC1" tabindex="-1" aria-labelledby="modalEquipPlantLabel" aria-hidden="true">
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
