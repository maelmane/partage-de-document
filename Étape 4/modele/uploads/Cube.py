#import the turlte modules
import turtle

#formating the window screen
tut = turtle.Screen()

#bg colour 
tut.bgcolor("black")

#window title 
tut.title("Cube")
my_pen = turtle.Turtle()

#object colour
my_pen.color("purple")
tut = turtle.Screen()

#forming front square face
for i in range(4):
    my_pen.forward(100)
    my_pen.left(90)
    
# bottom left side
my_pen.goto(50,50)

#forming back square face
for i in range(4):
    my_pen.forward(100)
    my_pen.left(90)
    
#bottom right side
my_pen.goto(150,50)
my_pen.goto(100,0)

#top right side
my_pen.goto(100,100)
my_pen.goto(150,150)

#top left side
my_pen.goto(50,150)
my_pen.goto(0,100)