<div class="modal fade" id="quickview-<?= $product->getId() ?>" tabindex="-1"
  aria-labelledby="quickview-<?= $product->getId() ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="quickview-<?= $product->getId() ?>">Thông tin sản phẩm</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row">
        <div class="col-md-6">
          <div class="mb-4">
            <img id="main-image" src="image/<?= $product->getFeaturedImage() ?>" alt="<?= $product->getName() ?>"
              class="img-fluid rounded" style="height: 530px;">
          </div>
          <!-- Thumbnail Images -->
          <div class="d-flex gap-2">
            <img src="image/<?= $product->getFeaturedImage() ?>" alt="Thumbnail 1" class="img-thumbnail thumbnail"
              style="width: 80px; height: 60px;">
            <img src="image/Product-IMG-13_360x.webp" alt="Thumbnail 2" class="img-thumbnail thumbnail"
              style="width: 80px; height: 60px;">
            <img src="image/Product-IMG-3_360x.webp" alt="Thumbnail 3" class="img-thumbnail thumbnail"
              style="width: 80px; height: 60px;">
            <img src="image/Product-IMG-4_360x.webp" alt="Thumbnail 4" class="img-thumbnail thumbnail"
              style="width: 80px; height: 60px;">
            <!-- chua co data -->
          </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
          <h2 class="h3"><?= $product->getName() ?></h2>
          <p class="text-warning mb-1">
            &#9733;&#9733;&#9733;&#9733;&#9734; <span class="text-muted">(2 reviews)</span>
            <!-- lam sau, chua co data -->
          </p>
          <p class="text-success">$<?= $product->getPrice() ?>
            <?php if ($product->getQty()) { ?>
            <span class="text-muted">In stock</span>
            <?php } else { ?>
            <span class="text-muted">Out of stock</span>
            <?php } ?>
          </p>
          <p>
            <?= $product->getDescription() ?>
          </p>

          <!-- Color Selection -->
          <div class="color-options">

            <p for="color" class="form-label">Color:</p>

            <?php $colors = $product->getColors();
                        foreach ($colors as $color) { ?>
            <span style="background-color:<?= $color->getCode() ?>;" title="<?= $color->getName() ?>"
              data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay='{"show": 100, "hide": 100}'
              onclick="changeImage(this, '<?= $color->getName() ?>')">
            </span>
            <?php } ?>

          </div>

          <!-- Quantity and Add to Cart -->
          <div class="d-flex align-items-center mb-4">
            <input type="number" class="form-control w-auto me-2" value="1" min="1" max="10" style="width: 80px;">
            <button class="btn btn-dark me-2">Add To Cart</button>
            <button class="btn btn-warning">Buy It Now</button>
          </div>

          <!-- Wishlist and Questions -->
          <p class="mb-2">
            <a href="#" class="text-decoration-none"><i class="bi bi-heart me-2"></i>Add to wishlist</a> |
            <a href="#" class="text-decoration-none"><i class="bi bi-question-circle me-2"></i>Ask a
              question</a>
          </p>

          <!-- Product Info -->
          <ul class="list-unstyled">
            <li><strong>SKU:</strong> SKU103</li>
            <li><strong>Brand:</strong> Ashley</li>
            <li><strong>Tags:</strong> Any, Fabric, Wood</li>
          </ul>

          <!-- Shipping Info -->
          <!-- <p>Estimated Delivery: <strong>30 - 08 January, 2025</strong></p>
                <p class="text-success">Free Shipping & Returns: On all orders over $500.00</p> -->

          <p><i class="bi bi-box-seam me-2"></i><strong>Estimated Delivery:</strong> 30 - 08 January, 2025</p>

          <p><i class="bi bi-truck me-2"></i><strong>Free Shipping & Returns:</strong> On all orders over
            $500.00
          </p>

          <!-- Social Share -->
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
              <i class="bi bi-twitter" title="Twitter" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-delay='{"show": 100, "hide": 100}'></i></a>
            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
              <i class="bi bi-facebook" title="Facebook" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-delay='{"show": 100, "hide": 100}'></i></a>
            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
              <i class="bi bi-pinterest" title="Pinterest" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-delay='{"show": 100, "hide": 100}'></i></a>
            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
              <i class="bi bi-linkedin" title="Linkedin" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-delay='{"show": 100, "hide": 100}'></i></a>
            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle">
              <i class="bi bi-envelope" title="Mail" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-delay='{"show": 100, "hide": 100}'></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>