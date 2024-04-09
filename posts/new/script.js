document.addEventListener("DOMContentLoaded", function () {
  const publishButton = document.getElementById("publish-button");
  const uploadImageInput = document.getElementById("image-upload");
  const bannerUploadInput = document.getElementById("banner-upload");

  publishButton.addEventListener("click", function () {
    console.log("Publish button clicked");
    // add submit to the db here
  });

  uploadImageInput.addEventListener("change", function () {
    const uploadedFile = this.files[0];
    console.log("File selected:", uploadedFile);
    // add submit to the db here
  });

  bannerUploadInput.addEventListener("change", function () {
    const uploadedFile = this.files[0];
    console.log("Banner selected:", uploadedFile);

    if (bannerUploadInput.files && bannerUploadInput.files[0]) {
      // add submit to the db here
      const reader = new FileReader();

      reader.onload = function (e) {
        bannerPreview.src = e.target.result;
      };

      reader.readAsDataURL(bannerUploadInput.files[0]);
    }
  });
});
