import React from "react";
import { createStackNavigator } from "@react-navigation/stack";
import HomeScreen from "../features/home/HomeScreen";
import DetailsScreen from "../features/home/DetailsScreen";
const Stack = createStackNavigator();
export default function StackNavigator() {
  return (
    <Stack.Navigator>
      <Stack.Screen name="Home" component={HomeScreen} />
      <Stack.Screen name="Details" component={DetailsScreen} />
    </Stack.Navigator>
  );
}
