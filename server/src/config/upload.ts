import multer from "multer";
import { join } from "path";

export default {
  storage: multer.diskStorage({
    destination: join(__dirname, "..", "..", "uploads"),
    filename: (request, file, cb) => {
      const fileName = `${Date.now()}-${Math.floor(
        Math.random() * 999 + 100
      )}.${file.originalname.trim().split(".").pop()}`;

      cb(null, fileName);
    },
  }),
};
