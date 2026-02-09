import os
import shutil
from PIL import Image
import hashlib

# Configuration
SOURCE_DIR = 'uploads'
DEST_DIR = 'assets/img/all'
EXTENSIONS = {'.png', '.jpg', '.jpeg', '.webp'}

def process_uploads():
    if not os.path.exists(DEST_DIR):
        os.makedirs(DEST_DIR)

    processed_files = []

    # Walk through source directory
    for root, dirs, files in os.walk(SOURCE_DIR):
        for file in files:
            ext = os.path.splitext(file)[1].lower()
            if ext in EXTENSIONS:
                filepath = os.path.join(root, file)
                
                try:
                    with Image.open(filepath) as img:
                        if img.mode in ('RGBA', 'P'):
                            img = img.convert('RGB')
                        
                        base_name = os.path.splitext(file)[0]
                        new_filename = base_name + '.jpg'
                        dest_path = os.path.join(DEST_DIR, new_filename)
                        
                        # Handle duplicate filenames
                        counter = 1
                        while os.path.exists(dest_path):
                            # check if it's the exact same file content (already processed)
                            # skip if already there logic would be complex without hash map
                            # stick to rename
                            new_filename = f"{base_name}_{counter}.jpg"
                            dest_path = os.path.join(DEST_DIR, new_filename)
                            counter += 1
                        
                        img.save(dest_path, 'JPEG', quality=85)
                        
                        processed_files.append((file, new_filename))
                        print(f"Processed: {file} -> {new_filename}")
                        
                except Exception as e:
                    print(f"Error processing {filepath}: {e}")

    return processed_files

if __name__ == "__main__":
    current_dir = os.getcwd()
    print(f"Working directory: {current_dir}")
    
    mapping = process_uploads()
    
    with open('uploads_mapping.txt', 'w') as f:
        for src, dest in mapping:
            f.write(f"{src},{dest}\n")
    
    print(f"Processed {len(mapping)} files from uploads/")
