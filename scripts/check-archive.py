#!/usr/bin/env python3
"""Check the Pages tar against every tracked file under public/ before upload."""
import os
from pathlib import Path
import subprocess
import sys
import tarfile


public = Path(__file__).resolve().parents[1] / 'public'
tracked = subprocess.check_output(['git', 'ls-files', '-z', '.'], cwd=public)
files = {Path(os.fsdecode(name)) for name in tracked.split(b'\0') if name}
directories = {parent for path in files for parent in path.parents}
seen = set()

with tarfile.open(sys.argv[1], 'r:') as archive:
    for member in archive:
        path = Path(member.name)
        if path in seen:
            sys.exit(f'Duplicate archive member: {member.name}')
        seen.add(path)
        if member.isdir() and path in directories:
            continue
        if not member.isfile() or path not in files:
            sys.exit(f'Unexpected archive member: {member.name}')
        if archive.extractfile(member).read() != (public / path).read_bytes():
            sys.exit(f'Archive content differs from public/{path}')

missing = files - seen
if missing:
    sys.exit('Missing archive files: ' + ', '.join(map(str, sorted(missing))))
print(f'Pages archive matches all {len(files)} tracked public files.')
