import { BlenderVersion } from "../entities/BlenderVersion";
import { RenderEngine } from "../entities/RenderEngine";

interface IProject {
  id?: string;
  title: string;
  description: string;
  blender_version: BlenderVersion;
  render_engine: RenderEngine;
  price: string;
  author: string;
  category_id: string;
  author_id: string;
  images: { image: string }[];
  main_image: string;
  project: string;
}

export { IProject };
