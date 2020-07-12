# City-team: DC
- Team members: Huiyu Yang, Joe Madejski, Qi Miao
## Classes and relationships
-  Classes: 
	- Student (has)
		- Name
		- Background
			- (has) Picture & Introduction
		- Major
		- Hobby
			-  (has) Picture & Description
		- Classes taken
			-  (has) Course Number & Course Name
				- (Course name is added to be more informative)

## Decisions about the choreography
The page is divided into navigation, header (which has students' name), and the rest is further divided into quadrants. 

The student's background is put in the top left since this is the most inportant information and gives some context to the rest of the content. 

Major is put below, following background, since all backgrounds mentioned what the student studies. 

Courses taken is to the right of major, so they would appear in the same screen when scrolled down to major. 

## Changes to original project 1 css:
- Changed color of < aside > from silver to white for better contrast with background since < aside > now holds more content
- Removed the 3° tilt on < aside > because it now holds more content
- Added dashed line and increased padding to create vertical devide between sections
