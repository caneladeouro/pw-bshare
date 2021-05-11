interface IProject {
  id: string;
  title: string;
  description: string;
  age_classification: string;
  price: string;
  category: ICategory;
  project: string;
  author: string;
  comment: string;
  images: string[];
  main_image: string;
  created_at: string;
}
