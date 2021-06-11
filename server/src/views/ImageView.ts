import { Image } from "../entities/Image";

export default {
  render(image: Image) {
    return {
      id: image.id,
      image: `http://${process.env.HOST}/uploads/${image.image}`,
    };
  },

  renderMany(images: Image[]) {
    return images.map((image) => this.render(image));
  },
};
