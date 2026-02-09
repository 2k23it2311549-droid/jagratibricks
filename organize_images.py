import os
import shutil
from PIL import Image
import hashlib

# Configuration
SOURCE_DIR = 'assets/img'
DEST_DIR = 'assets/img/all'
EXTENSIONS = {'.png', '.jpg', '.jpeg', '.webp'}

def get_file_hash(filepath):
    """Calculate MD5 hash of a file."""
    hasher = hashlib.md5()
    with open(filepath, 'rb') as f:
        buf = f.read()
        hasher.update(buf)
    return hasher.hexdigest()

def process_images():
    if not os.path.exists(DEST_DIR):
        os.makedirs(DEST_DIR)

    file_hashes = {}
    processed_files = []

    # Walk through source directory
    for root, dirs, files in os.walk(SOURCE_DIR):
        # Skip the destination directory itself to avoid recursion if it's inside source
        if os.path.abspath(root) == os.path.abspath(DEST_DIR):
            continue
            
        for file in files:
            ext = os.path.splitext(file)[1].lower()
            if ext in EXTENSIONS:
                filepath = os.path.join(root, file)
                
                # specific check to avoid processing the destination folder if it was already created and populated
                if DEST_DIR in filepath.replace('\\', '/'):
                    continue

                try:
                    # Calculate hash to check for duplicates
                    file_hash = get_file_hash(filepath)
                    
                    if file_hash in file_hashes:
                        print(f"Duplicate found: {filepath} (same as {file_hashes[file_hash]})")
                        continue
                    
                    # Open image
                    with Image.open(filepath) as img:
                        # Convert to RGB (standard for JPG)
                        if img.mode in ('RGBA', 'P'):
                            img = img.convert('RGB')
                        
                        # Define new filename
                        # Use concise names if possible, or keep original base name
                        # For simplicity and to avoid collisions, we use the original name
                        # but we can try to clean it up if needed.
                        
                        base_name = os.path.splitext(file)[0]
                        new_filename = base_name + '.jpg'
                        dest_path = os.path.join(DEST_DIR, new_filename)
                        
                        # Handle filename collision in destination
                        counter = 1
                        while os.path.exists(dest_path):
                            new_filename = f"{base_name}_{counter}.jpg"
                            dest_path = os.path.join(DEST_DIR, new_filename)
                            counter += 1
                        
                        # Save as JPG
                        img.save(dest_path, 'JPEG', quality=85)
                        
                        file_hashes[file_hash] = dest_path
                        processed_files.append((filepath, dest_path))
                        print(f"Processed: {filepath} -> {dest_path}")
                        
                except Exception as e:
                    print(f"Error processing {filepath}: {e}")

    return processed_files

if __name__ == "__main__":
    current_dir = os.getcwd()
    print(f"Working directory: {current_dir}")
    
    # Start processing
    mapping = process_images()
    
    print("\nProcessing complete.")
    print(f"Total images processed: {len(mapping)}")
    
    # Generate a mapping file for reference
    with open('image_mapping.txt', 'w') as f:
        for src, dest in mapping:
            f.write(f"{src} -> {dest}\n")
