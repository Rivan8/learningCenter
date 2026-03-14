<style>
  .video-item {
    cursor: pointer;
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
    background: #fff;
    user-select: none;
  }
  .video-item:hover {
    background: linear-gradient(90deg, #f59e0b10 0%, #2563eb10 100%);
    box-shadow: 0 4px 16px rgba(37,99,235,0.15);
    transform: translateY(-2px);
    border-color: #2563eb;
  }
  .video-item.active {
    background: linear-gradient(90deg, #2563eb15 0%, #f59e0b15 100%);
    border-color: #2563eb;
    box-shadow: 0 2px 8px rgba(37,99,235,0.2);
  }
  .video-item img {
    transition: transform 0.3s ease;
  }
  .video-item:hover img {
    transform: scale(1.05);
  }
  .video-player-container {
    position: relative;
    width: 100%;
    height: 100%;
  }
</style>

@php
  $baseUrl = rtrim(request()->getBaseUrl(), '/');
  $needsPublicPrefix = file_exists(base_path('index.php'));
  $assetBase = $needsPublicPrefix ? ($baseUrl . '/public') : $baseUrl;
@endphp

<div class="modal fade" id="modalEquipFC1" tabindex="-1" aria-labelledby="modalEquipFC1Label" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="max-width: 95%; height: 95vh;">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-primary">Foundation Class 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="height: calc(100% - 80px); overflow-y: auto; background: linear-gradient(120deg, #f6f8fa 60%, #e3f2fd 100%);">
        <div class="row g-4">
          <!-- Video Player - Left Side -->
          <div class="col-md-8">
            <div class="card shadow-lg border-0 h-100">
              <div class="position-relative">
                <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                  <iframe id="mainVideoPlayer" src="https://www.youtube.com/embed/aic7WQaozcY?rel=0" title="YouTube video" allowfullscreen style="border-radius: 12px 12px 0 0;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                </div>
                <div class="position-absolute" style="top: 15px; left: 15px; z-index: 10; opacity: 0.8;">
                  <img src="{{ $assetBase }}/assets/img/kaiadmin/logo_light.svg" alt="Logo" style="max-width: 120px; height: auto;">
                </div>
              </div>
              <div class="p-4">
                <h5 id="videoTitle" class="mb-2 fw-bold text-primary">Salvation - Keselamatan (Bag 1)</h5>
                <p id="videoDescription" class="text-muted mb-0">Kelas Foundation Class 1 - Salvation - Keselamatan (Bag 1)</p>
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
                <div class="video-item mb-3 p-3 border rounded-3 d-flex align-items-center active" data-video-id="aic7WQaozcY" data-video-title="Salvation - Keselamatan (Bag 1)" data-video-description="Kelas Foundation Class 1 - Salvation - Keselamatan (Bag 1)">
                  <img src="https://img.youtube.com/vi/aic7WQaozcY/mqdefault.jpg" alt="Thumbnail 1" class="me-3 rounded-2" style="width: 80px; height: 60px; object-fit: cover;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1 fw-bold text-dark">Salvation - Keselamatan (Bag 1)</h6>
                    <small class="text-muted">Foundation Class 1</small>
                  </div>
                </div>

                <div class="video-item mb-3 p-3 border rounded-3 d-flex align-items-center" data-video-id="prkDenNzSlo" data-video-title="Salvation - Keselamatan (Bag 2)" data-video-description="Kelas Foundation Class 1 - Salvation - Keselamatan (Bag 2)">
                  <img src="https://img.youtube.com/vi/prkDenNzSlo/mqdefault.jpg" alt="Thumbnail 2" class="me-3 rounded-2" style="width: 80px; height: 60px; object-fit: cover;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1 fw-bold text-dark">Salvation - Keselamatan (Bag 2)</h6>
                    <small class="text-muted">Foundation Class 1</small>
                  </div>
                </div>

                <div class="video-item mb-3 p-3 border rounded-3 d-flex align-items-center" data-video-id="aIcCk-0DPlo" data-video-title="Salvation - Keselamatan (Bag 3)" data-video-description="Kelas Foundation Class 1 - Salvation - Keselamatan (Bag 3)">
                  <img src="https://img.youtube.com/vi/aIcCk-0DPlo/mqdefault.jpg" alt="Thumbnail 3" class="me-3 rounded-2" style="width: 80px; height: 60px; object-fit: cover;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1 fw-bold text-dark">Salvation - Keselamatan (Bag 3)</h6>
                    <small class="text-muted">Foundation Class 1</small>
                  </div>
                </div>

                <div class="video-item mb-3 p-3 border rounded-3 d-flex align-items-center" data-video-id="L_jWHffIx5E" data-video-title="Salvation - Keselamatan (Bag 4)" data-video-description="Kelas Foundation Class 1 - Salvation - Keselamatan (Bag 4)">
                  <img src="https://img.youtube.com/vi/L_jWHffIx5E/mqdefault.jpg" alt="Thumbnail 4" class="me-3 rounded-2" style="width: 80px; height: 60px; object-fit: cover;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1 fw-bold text-dark">Salvation - Keselamatan (Bag 4)</h6>
                    <small class="text-muted">Foundation Class 1</small>
                  </div>
                </div>

                <div class="video-item mb-3 p-3 border rounded-3 d-flex align-items-center" data-video-id="L_jWHffIx5E" data-video-title="Baptisan (Bag 1)" data-video-description="Kelas Foundation Class 1 - Baptisan (Bag 1)">
                  <img src="https://img.youtube.com/vi/L_jWHffIx5E/mqdefault.jpg" alt="Thumbnail 5" class="me-3 rounded-2" style="width: 80px; height: 60px; object-fit: cover;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1 fw-bold text-dark">Baptisan (Bag 1)</h6>
                    <small class="text-muted">Foundation Class 1</small>
                  </div>
                </div>

                <div class="video-item mb-3 p-3 border rounded-3 d-flex align-items-center" data-video-id="L_jWHffIx5E" data-video-title="Baptisan (Bag 2)" data-video-description="Kelas Foundation Class 1 - Baptisan (Bag 2)">
                  <img src="https://img.youtube.com/vi/L_jWHffIx5E/mqdefault.jpg" alt="Thumbnail 6" class="me-3 rounded-2" style="width: 80px; height: 60px; object-fit: cover;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1 fw-bold text-dark">Baptisan (Bag 2)</h6>
                    <small class="text-muted">Foundation Class 1</small>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all video items
    const videoItems = document.querySelectorAll('.video-item');
    const videoPlayer = document.getElementById('mainVideoPlayer');
    const videoTitle = document.getElementById('videoTitle');
    const videoDescription = document.getElementById('videoDescription');

    // Add click event listener to each video item
    videoItems.forEach(function(item) {
        item.addEventListener('click', function() {
            // Get video data from data attributes
            const videoId = this.getAttribute('data-video-id');
            const title = this.getAttribute('data-video-title');
            const description = this.getAttribute('data-video-description');

            // Update video player
            if (videoPlayer) {
                videoPlayer.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
            }

            // Update title and description
            if (videoTitle) {
                videoTitle.textContent = title;
            }
            if (videoDescription) {
                videoDescription.textContent = description;
            }

            // Remove active class from all items
            videoItems.forEach(function(videoItem) {
                videoItem.classList.remove('active');
            });

            // Add active class to clicked item
            this.classList.add('active');
        });
    });

    // Initialize first video as active when modal opens
    const modal = document.getElementById('modalEquipFC1');
    if (modal) {
        modal.addEventListener('shown.bs.modal', function() {
            const firstVideoItem = document.querySelector('.video-item');
            if (firstVideoItem) {
                firstVideoItem.classList.add('active');
            }
        });
    }
});
</script>
