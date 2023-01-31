<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Images</title>
</head>
<body>
<div class="grid-container">
  @foreach ($images as $image)
    <div class="grid-item">
      <img src="{{ asset('storage/' . $image) }}" alt="Image">
    </div>
  @endforeach
</div>

</body>
</html>

<style>
    .grid-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 20px;
}

.grid-item {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 200px;
  overflow: hidden;
}

.grid-item img {
  max-width: 100%;
  max-height: 100%;
  object-fit: cover;
}

</style>